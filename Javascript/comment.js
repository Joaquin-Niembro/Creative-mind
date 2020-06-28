const com = document.getElementById('hey');
comment= () =>{
    var comment = prompt("Please enter your comment", "comment");
    alert(`your comment: "${comment}" has been submited`);
    com.innerText=`comment: ${comment}`;
}