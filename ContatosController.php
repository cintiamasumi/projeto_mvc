<?php 
class ContatosController extends Controller
{
 
    /**
     * Lista os contatos
     */
    public function listar()
    {
        $contatos = Contato::all();
        return $this->view('grade', ['contatos' => $contatos]);
    }
 
    /**
     * Mostrar formulario para criar um novo contato
     */
    public function criar()
    {
        return $this->view('form');
    }
    /**
     * Mostrar critografia
     */
    public function criptografia($dados)
    {
        return $this->view('criptografia',['dados'=> $dados,true]);
    }
 
    /**
     * Mostrar formulário para editar um contato
     */
    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $contato = Contato::find($id);
 
        return $this->view('form', ['contato' => $contato]);
    }
 
    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar()
    {
        $contato = new Contato;
        $contato->hostname = $this->request->hostname;
        $contato->ip = $this->request->ip;
        $contato->fabricante = $this->request->fabricante;
        $contato->tipo = $this->request->tipo;
        $contato->email = $this->request->email;
        if ($contato->save()) {
            return $this->listar();
        }
    }
 
    /**
     * Atualizar o contato conforme dados submetidos
     */
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $contato           = Contato::find($id);
        $contato->nome     = $this->request->nome;
        $contato->telefone = $this->request->telefone;
        $contato->email    = $this->request->email;
        $contato->save();
 
        return $this->listar();
    }
 
    /**
     * Apagar um contato conforme o id informado
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $contato = Contato::destroy($id);
        return $this->listar();
    }
    /***
    *cifra de cesar
    */
    public function cifra_cesar()
    {
        $text = (object) $_POST;
        $resultado = (object)array('cesar' => '','aes256'=>'' );
        $n = 4;
        $tamanhoAlfabeto = 256;
        $original = $text->texto;
        $crip =  '';
        $descrip = '';

        /**
        *Cifra de Cesar
        **/
        for($i = 0; $i< strlen($original);$i++){
            $key = ord($original[$i]);
            //soma + n
            $seguro = $key + $n;
            //calculo  mod
            $seguro = $seguro % $tamanhoAlfabeto;
            if($seguro >= 0 && $seguro){
                //$novoCodigo += $fora;
                $crip .= chr($seguro);   
            }
        }
        $resultado->cesar = $crip;
		
		
		/*
		*AES256 SALT
		*/
		$output = false;
		$string = $text->texto;
		$encrypt_method = "AES-256-CBC";
		$secret_key = '#Dispotivos@2019!';
		$secret_iv = '#Projeto@2019!';
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);//SALT
		$output = base64_encode($output);
		
		$resultado->aes256 = rtrim($output, "=");
		
		
        return $this->criptografia($resultado);
    }
    /**
    *Descriptografia
    **/
    public function descriptografia(){
        $text = (object) $_POST;
        $resultado = (object)array('descesar' => '','teste'=>'' );
        $n = 4;
        $crip = $text->textocesar;
        $descrip = '';

        /**
        *Descriptografia Cifra de Cesar
        **/
        for($i = 0; $i< strlen($crip);$i++){
            $key = ord($crip[$i]);
            $limpo = $key - $n;
            //calculo  mod
            if($limpo >= 0 && $limpo){
                //$novoCodigo += $fora;
                $descrip .= chr($limpo);   
            }
        }
        $resultado->descesar = $descrip;
		
		/*
		*AES256
		*/
		
		$output = false;
		$string = $text->textoaes256;
		$encrypt_method = "AES-256-CBC";
		$secret_key = '#Dispotivos@2019!';
		$secret_iv = '#Projeto@2019!';
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv); // SALT
		
		
		$resultado->teste = rtrim($output, "=");
		
        return $this->criptografia($resultado);
    }
}
?>