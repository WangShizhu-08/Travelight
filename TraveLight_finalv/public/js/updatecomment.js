$(function() {
    var dest = $("#dest").html().trim();

    $.ajax({
        type: "GET",
        url: "http://api.hotwire.com/v1/deal/hotel?apikey=6e8zytkk8d3mdrksyqhqf3x3&limit=10&dest=" + dest,
        dataType: "xml",
        success: function(xml) {
            $(xml).find("HotelDeal").each(function() {
                var href = $(this).find("Url").text();
                var text = $(this).find("Headline").text();
                var html = '<li><a href="' + href + '">' + text + '</a></li>';
                // console.log(html)
                $('#hotel_list').append(html);
            });
        }
    });

    $("#sendcomment").click(function () {
        var tourl = window.location.href + "/storecomment";
        var comments_content = $("#comments_content").val();
        $("#comments_content").val("");
        $.ajax({
            type: 'get',
            url: tourl,
            data: {
            'comments_content': comments_content
            }
        });
    })

    function loadLog() {
        var tourl = window.location.href + "/updatecomment";
        $.ajax({
            type: "get",
            url: tourl,
            cache: false,
            success: function(html) {
                var index = html.indexOf("##");
                var comments_number = html.substring(0, index);
                var content = html.substring(index + 2);
                $("#comments_number").html(comments_number);
                $("#chatbox").html(content);
            }
        });
    }
    setInterval(loadLog, 2000);
});
