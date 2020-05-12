<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Idea;
use DB;

class SearchController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function search(Request $request){
        // return view('searchresult');
        $search_cata = request('search_cata');
        $search_kw = request('search_kw');
        $search_par = request('search_par');
        $output="";
        $total_records=0;

        // if there's not search keyword, return all ideas
        if(!$search_kw){
            $ideas = Idea::all();
            $total_records = $ideas->count();

            foreach($ideas as $idea){
                $output .= 
                        '<tr> 
                        <td><a href="ideas/'.$idea->id.'">'.$idea->id.'</a></td>
                        <td><a href="ideas/'.$idea->id.'">'.$idea->title.'</a></td>
                        <td>'.$idea->destination.'</td>
                        <td>'.$idea->startdate.'</td>
                        <td>'.$idea->enddate.'</td>
                        <td>'.$idea->comments_number.'</td>
                        </tr>' ;
            }
        }

        else{
            // search catalog is tag
            if($search_cata == 'tag'){
                $tag_id = DB::table('taggable_tags')
                ->where('normalized',$search_kw)
                ->value('tag_id');

                if($tag_id != ''){
                    $idea_ids = DB::table('taggable_taggables')
                                ->where('tag_id',$tag_id)
                                ->get('taggable_id');
                    
                    $total_records = $idea_ids->count();

                    foreach($idea_ids as $idea_id){
                        $idea = Idea::find($idea_id->taggable_id);
                        $output .= 
                                '<tr> 
                                <td><a href="ideas/'.$idea->id.'">'.$idea->id.'</a></td>
                                <td><a href="ideas/'.$idea->id.'">'.$idea->title.'</a></td>
                                <td>'.$idea->destination.'</td>
                                <td>'.$idea->startdate.'</td>
                                <td>'.$idea->enddate.'</td>
                                <td>'.$idea->comments_number.'</td>
                                </tr>' ;
                    }
                }

                else{
                    $total_records = 0;
                    $output .= 
                        "<tr>
                            <td align='center' colspan = '7'> No Records Found, <a href='ideas/create'>create one!</a></td>
                        </tr>";
                }
            }

            // search catalog is destination
            else{
                // partial search
                if($search_par){
                    $ideas = DB::table('ideas')
                            ->where('destination','like','%'.$search_kw.'%')
                            ->get();
                    
                    $total_records = $ideas->count();
                    
                    if($total_records>0){
                        foreach($ideas as $idea){
                            $output .= 
                                    '<tr> 
                                    <td><a href="ideas/'.$idea->id.'">'.$idea->id.'</a></td>
                                    <td><a href="ideas/'.$idea->id.'">'.$idea->title.'</a></td>
                                    <td>'.$idea->destination.'</td>
                                    <td>'.$idea->startdate.'</td>
                                    <td>'.$idea->enddate.'</td>
                                    <td>'.$idea->comments_number.'</td>
                                    </tr>' ;
                        }
                    }
                    else{
                        $output .= 
                        "<tr>
                            <td align='center' colspan = '7'> No Records Found, <a href='ideas/create'>create one!</a></td>
                        </tr>";
                    }
                }
                // non-partial search
                else{
                    $ideas = DB::table('ideas')
                        ->where('destination',$search_kw)
                        ->get();
                    
                    $total_records = $ideas->count();
                    
                    if($total_records>0){
                        foreach($ideas as $idea){
                            $output .= 
                                    '<tr> 
                                    <td><a href="ideas/'.$idea->id.'">'.$idea->id.'</a></td>
                                    <td><a href="ideas/'.$idea->id.'">'.$idea->title.'</a></td>
                                    <td>'.$idea->destination.'</td>
                                    <td>'.$idea->startdate.'</td>
                                    <td>'.$idea->enddate.'</td>
                                    <td>'.$idea->comments_number.'</td>
                                    </tr>' ;
                        }
                    }
                    else{
                        $output .= 
                        "<tr>
                            <td align='center' colspan = '7'> No Records Found, try partial search?</td>
                        </tr>";
                    }
                }
            }
        }
        $data = json_encode(array(
            'table_data'   =>  $output,
            'total_records'  => $total_records
        ));

        return view('searchresult',compact('data'));

    }

}
