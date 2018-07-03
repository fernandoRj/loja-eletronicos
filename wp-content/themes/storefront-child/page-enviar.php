 <?php /* Template name: enviar */ ?>
 

<?php 

 
.titulo-destaque a{
	color:white;
	 bottom:0;
    left:0;
	position:absolute;
	font-size:25px;
	margin-left:20px;
	top:325px;
	
}

.descri-destaque p {
		color:white;
		position:absolute;
		margin-left:20px;
		 bottom:0;
    left:0;
	top:80%;
}





 $nome = $_POST["nome"];
 $email = $_POST["email"];
 $menssagem = $_POST["menssagem"];
 $assunto = $_POST["assunto"];
$headers = 'From: equipe@9mobile.com.br' . "\r\n" .
    'Reply-To: equipe@9mobile.com.br' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
 $msg = $nome."\r\n".$email."\r\n".$menssagem."\r\n".$assunto."\r\n";


mail('equipe@9mobile.com.br', 'Contato 9mobile', $msg,$headers );

?>


<script type="text/javascript">
alert("Email enviado com sucesso!");
window.location = "https://digitalmobiletecnologia.com.br/";
</script> 
