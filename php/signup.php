<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $passwd = mysqli_real_escape_string($conn, $_POST['passwd']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($passwd)) {
        // Let's check user email is valid or not * Vamos verificar se o e-mail do usuário é válido ou não  
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // if email is valid * se o email é válido 
            // Let's check that email already exist in the database or not * Vamos verificar se o e-mail já existe no banco de dados ou não
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0) { // if email already exist * se o email já existe 
                echo "$email - This email already exist * Este email já existe ";
                
            } else {
                
                // Let's check user upload file or not * Vamos verificar o arquivo de upload do usuário ou não 
                if(isset($_FILES['image'])){ // if file is uploaded *  se o arquivo for carregado 
                    $img_name = $_FILES['image']['name']; // getting user uploaded image name * obtendo o nome da imagem enviada pelo usuário 

                    $tmp_name = $_FILES['image']['tmp_name']; // This temporary name is user to save/move file in out folder * Este nome temporário é usado pelo usuário para salvar / mover o arquivo para fora da pasta 

                    // Let's explde image and get the last extension like jpg or png * Vamos explorar a imagem e obter a última extensão como jpg ou png 
                    $img_explode = explode('.', $img_name);
                    
                    $img_ext = end($img_explode); // Here we get the extension of an user uploaded image file * Aqui, obtemos a extensão de um arquivo de imagem carregado pelo usuário 
                    
                    $extensions = ['png', 'jpeg', 'jpg']; // these are some valid image ext and we've store the in array * estes são alguns ext de imagens válidos e nós armazenamos o array in 

                    if(in_array($img_ext, $extensions) === true) { // if user uploaded image ext is matched with any array extensions * se a extensão da imagem enviada pelo usuário corresponder a qualquer extensão de array 

                        $time = time(); // This will return us current time... * Isso nos retornará a hora atual ...
                                        // We need this time because when you uploading user image to in our folder we rename user file with current time so all the image file will have a unique name * Precisamos desse tempo porque quando você faz o upload da imagem do usuário em nossa pasta, renomeamos o arquivo do usuário com a hora atual para que todos os arquivos de imagem tenham um nome único 
                                        
                        // Let's move the user uploaded image to our particular folder *  Vamos mover a imagem enviada pelo usuário para nossa pasta particular 

                        $new_img_name = $time.$img_name;
                        //var_dump($new_img_name);
                        //var_dump(move_uploaded_file($tmp_name, "../images/".$new_img_name));

                        if(move_uploaded_file($tmp_name, "../images/".$new_img_name)){ // if user upload image move to our folder successfully * se o usuário carregar a imagem, mover para nossa pasta com sucesso 
                            
                            $status = "Active now"; // Once user signed up then his status will be active now * Uma vez que o usuário se inscreveu, seu status ficará ativo agora 

                            $randon_id = rand(time(), 100000); // Creating random id for user * Criando id aleatório para o usuário 

                            // Let's insert all user data inside table * Vamos inserir todos os dados do usuário dentro da tabela 
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES ({$randon_id}, '{$fname}', '{$lname}', '{$email}', '{$passwd}', '{$new_img_name}', '{$status}')");

                            if($sql2){
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user unique_id in other php file * usando esta sessão, usamos user unique_id em outro arquivo php 
                                    echo "success";
                                } 
                            } else {
                                echo "Something went wrong. Try again  * Algo deu errado. Tente novamente";
                            }

                        }
                        
                        
                        //
                    } else {
                        echo "Please select an Image file | jpg, png| Selecione um arquivo de imagem";
                    }

                } else {
                    echo "Please select an Image file * Selecione um arquivo de imagem";
                }
            }
        } else {
            echo "$email - This is not a valid email! * Este não é um email válido!";
        }
    } else {
        echo "All input field are required! * Todos os campos de entrada são obrigatórios! ";
    }

?>