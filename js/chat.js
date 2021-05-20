const form = document.querySelector(".typing-area");
const inputField = form.querySelector(".input-field");
const sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=> {
    e.preventDefault(); // Preventing form from submitting * Impedindo o envio do formulário
}

sendBtn.onclick = () => {
    // Let's start Ajax *  Vamos começar Ajax
    let xhr = new XMLHttpRequest(); // Creating xml object * Criação de objeto xml
    xhr.open("POST", "php/insert_chat.php", true);
    //console.log(xhr);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = ""; // Once message inserted into database then leave blank the input field * Assim que a mensagem for inserida no banco de dados, deixe em branco o campo de entrada 
                scrollToBottom();
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

chatBox.onmouseenter = ()=> {
    chatBox.classList.add("active");
} 
chatBox.onmouseleave = ()=> {
    chatBox.classList.remove("active");
}

setInterval(() => {
    let xhr = new XMLHttpRequest(); // Creating xml object * Criação de objeto xml
    xhr.open("POST", "php/get_chat.php", true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")) {
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form); // Creating new formData Object * Criando novo objeto formData 

    xhr.send(formData); // Sending the form data to php * Enviando os dados do formulário para php 

}, 500); // This function will run frequently after 500ms * Esta função será executada freqüentemente após 500ms 

function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}