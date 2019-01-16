		<?php
		//file necessari ad inviare foto, doc e audio
		require 'class-http-request.php';
		require 'functions.php';
		//modificare col vostro token del bot
		$api="727926244:AAEDkpPBz_hh75dyFH02ZslGZYkScUNWglY";
		
		
		//prendo quello che mi è arrivato e lo salvo nella variabile content
		$content = file_get_contents("php://input");
		//decodifico quello che mi è arrivato
		$update = json_decode($content, true);
		//se non sono riuscito a decodificarlo mi fermo
		if(!$update)
		{
		  exit;
		}

        //altrimenti proseguo e vado a leggere il messaggio salvandolo nella variabile 
		//message
		$message = isset($update['message']) ? $update['message'] : "";
		//facciamo la stessa cosa anche per l'id del mess.
		$messageId = isset($message['message_id']) ? $message['message_id'] : "";
		//l'id della chat che servirà al nostro bot per sapere a chi risponder
		$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
		//il nome dell'utente che ha scritto
		$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
		//il cognome
		$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
		//lo username
		$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
		//la data
		$date = isset($message['date']) ? $message['date'] : "";
		//ed il testo del messaggio
		$text = isset($message['text']) ? $message['text'] : "";
        //eliminiamo gli spazi con trim e convertiamo in minuscolo con la funz strtolower
		
		$text = trim($text);
		$text = strtolower($text);
        
		//$text = json_encode($message);
		 //costruiamo la risposta del nostro bot
		 //l'header è sempre uguale ed indica che sarà un messaggio con codifica
		 //JSON
		header("Content-Type: application/json");
		//i parametri sono cosa voglio mandare indietro al mio utente, rimando il testo che
		//ho ricevuto e che si trova nella variabile $text
		$parameters = array('chat_id' => $chatId, "text" => $text);
		
	
		if($text=="barz"){
			$barz[0] ="Totti e la fidanzata devono andare ad una festa. Totti decide di mettersi lo smoking, arrivati all' entrata del locale c'era scritto 'no smoking' allora Totti dice alla fidanzata: 'hai visto amò avevo fatto meglio se mi ero messo la tuta' ";

		        $barz[1] = "Capello dice a Totti di accendere la luce. Lui guarda l'interruttore e comincia a accendere e spegnere in continuazione e Capello gli chiede: 'ma che fai?' e Totti risponde: 'c'è scritto 220 volt'.";
		
			$barz[2] =" Un amico di Totti ha ricevuto una ferrari nuovissima e ci sta per andate e Totti gli fa: 'aoh me raccomando vai piano Dopo un pò lo chiama al telefono ma non lo trova poi quando l'amico ritorna Totti gli fa: 'aoh do cavolo sei annato così lontano..il tuo telefono era irraggiungibile!";
		
			$i=rand(0,2);
			$parameters = array('chat_id' => $chatId, "text" => $barz[$i]);
			
			
			
			
		if($text=="foto"){
			$foto[0] ="foto.png";

		        $foto[1] = "foto1.png";
		
			$foto[2] ="foto2.png";
		
			$i=rand(0,2);
			sendFoto($chatId,$foto[$i],false,"lamia foto",$api);
			
			
			

		}

		if($text=="audio"){
				sendaudio($chatId,"audio.mp3",false,"il mio audio", $api);
		}
		if($text=="trantran"){
				sendaudio($chatId,"trantran.mp3",false,"tran tran", $api);
		}


		//aggiungo il comando di invio
		//e lo invio
		
		$parameters["method"] = "sendMessage";
        	echo json_encode($parameters);
		
		
		
		?>
		
		
		
		
		
		

		
		
		
