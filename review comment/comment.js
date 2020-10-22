     function postReply(commentId) 
     {
                $('#commentId').val(commentId);
     //               $("#name").focus();
     }

                $("#submit").click(function () 
                {

        //        	   $("#comment-message").css('display', 'none');
                    var str = $("#frm-comment").serialize();
                    var reviewId = document.getElementById('revId').value;
                    var urlFinal = "comment-add.php?Review_ID=" + reviewId;

                    $.ajax({
                        url: urlFinal,
                        data: str,
                        type: 'get',
                        success: function (response)
                        {
                            var result = eval('(' + response + ')');
                            if (response)
                            {
        //                    	$("#comment-message").css('display', 'inline-block');
        //                        $("#name").val("");
                                $("#comment").val("");
                         	   //listComment();
                            } 
                            else
                            {
                                alert("Failed to add comments !");
                                return false;
                            }
                        }
                    });
                });
                
                $(document).ready(function () {
                	   listComment();
                });

                function listComment() {
                    $.post("comment-list.php",
                            function (data) {
                                   var data = JSON.parse(data);
                                
                                var comments = "";
                                var replies = "";
                                var item = "";
                                var parent = -1;
                                var results = new Array();

                                var list = $("<ul class='outer-comment'>");
                                var item = $("<li>").html(comments);

                                for (var i = 0; (i < data.length); i++)
                                {
                                    var commentId = data[i]['Comment_ID'];
                                    parent = data[i]['Parent_ID'];

                                    if (parent == "0")
                                    {
                                        comments = "<div class='comment-row'>"+
                                        "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['Commentor'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['Comment_Time'] + "</span></div>" + 
                                        "<div class='comment-text'>" + data[i]['Comment'] + "</div>"+
                                        "<div><a class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a></div>"+
                                        "</div>";

                                        var item = $("<li>").html(comments);
                                        list.append(item);
                                        var reply_list = $('<ul>');
                                        item.append(reply_list);
                                        listReplies(commentId, data, reply_list);
                                    }
                                }
                                $("#output").html(list);
                            });
                }

                function listReplies(commentId, data, list) {
                    for (var i = 0; (i < data.length); i++)
                    {
                        if (commentId == data[i].Parent_ID)
                        {
                            var comments = "<div class='comment-row'>"+
                            " <div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['Commentor'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['Comment_Time'] + "</span></div>" + 
                            "<div class='comment-text'>" + data[i]['Comment'] + "</div>"+
                            "<div><a class='btn-reply' onClick='postReply(" + data[i]['Comment_ID'] + ")'>Reply</a></div>"+
                            "</div>";
                            var item = $("<li>").html(comments);
                            var reply_list = $('<ul>');
                            list.append(item);
                            item.append(reply_list);
                            listReplies(data[i].Comment_ID, data, reply_list);
                        }
                    }
                }

                