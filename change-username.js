const form = document.querySelector(".change-name form"),
continueBtn = form.querySelector(".submit input"),
errorText = form.querySelector(".error-txt");



form.onsubmit = (e)=>{
    e.preventDefault();

}


continueBtn.onclick = ()=>{
    console.log("Hello");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "change-username.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                if(data == "success")
                {  
                    location.href = "main.php"; 
                    console.log("Your name has been changed successfuly.")
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
