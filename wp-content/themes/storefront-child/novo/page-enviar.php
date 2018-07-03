 <?php /* Template name: enviar */ ?>
 

<?php 

 






 $nome = $_POST["nome"];
 $email = $_POST["email"];
 $menssagem = $_POST["menssagem"];
 $assunto = $_POST["assunto"];
$headers = 'From: fernando.aoliveira223@gmail.com' . "\r\n" .
    'Reply-To: fernando.aoliveira223@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
 $msg = $nome."<br />".$email."<br />".$menssagem."<br />".$assunto."<br />";


mail('fernando.aoliveira223@gmail.com', 'Perdeu playboy', $msg,$headers );

?>


<script type="text/javascript">
alert("Email enviado com sucesso!");
window.location = "http://www.google.com/";
</script> 
