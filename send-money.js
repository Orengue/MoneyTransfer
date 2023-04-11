const form = document.querySelector(".send-money-page form "),
sendBtn = form.querySelector(".submit input"),
errorText = form.querySelector(".error-txt");



form.onsubmit = (e)=>{
    e.preventDefault();

}
sendBtn.onclick = ()=>{
    console.log("Hello");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "send.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Success")
                {
                  errorText.style.display = "None";
                  document.getElementById("user-page").scrollIntoView({ behavior: "smooth" });
                  
                  setTimeout(function() {
                    location.reload();
                }, 1000);
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "Block";
                }
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData)
}
