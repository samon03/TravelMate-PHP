function submitReview(user, reviewId)
{
    var ratingComment = document.getElementById("review_comment");

    var currentComment = ratingComment.value;

    if(currentComment == "") return;

    var submitBtn = document.getElementById("review_submit");
    // submitBtn.innerText = "Submited"

    var xmlHttp = new XMLHttpRequest();
    
    xmlHttp.open("POST", "../../TravelMate/controllers/review_comment_post.php", true);
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send("&Comment=" + currentComment + "&Review_ID=" + reviewId);

    xmlHttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200) {
            var success = false;
            if(this.responseText == 1) {
                // submitBtn.classList.remove("label-primary");
                // submitBtn.classList.add("label-success");
                // submitBtn.innerText = "Review posted"
                success = true;
            } else {
                // submitBtn.innerText = "Failed"
                success = false;
            }
            location.reload(); 
            setTimeout(function() {
                // submitBtn.classList.remove("label-success");
                // submitBtn.classList.add("label-primary");
                submitBtn.innerHTML = "Submit"
                ratingComment.value = "";
            }, 2000);


        }
    }
}