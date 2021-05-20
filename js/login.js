const form = document.querySelector(".login form");
const continueBtn = form.querySelector(".button input");
const errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=> {
    e.preventDefault(); // Preventing form from submitting * Impedindo o envio do formulário
}

continueBtn.onclick = () => {
    // Let's start Ajax *  Vamos começar Ajax
    let xhr = new XMLHttpRequest(); // Creating xml object * Criação de objeto xml
    xhr.open("POST", "php/login.php", true);
    //console.log(xhr);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE ){
            if(xhr.status === 200){
                let data = xhr.response;
                //console.log(data);
                if(data == 'success'){
                    //console.log(data);
                    location.href = "user.php"
                } else {
                    console.log(data);
                    errorText.textContent = data;
                    errorText.style.display = "block";

                }
            }
        }
    }
    /**
     * We have to send the form data through ajax to php
     * Temos que enviar os dados do formulário através de ajax para php 
     */
    let formData = new FormData(form); // Creating new formData Object * Criando novo objeto formData 

    xhr.send(formData); // Sending the form data to php * Enviando os dados do formulário para php 
}
