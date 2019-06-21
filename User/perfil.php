<!DOCTYPE html>

  <html>

    <head>    
      <?php
        session_start();
        
        if(isset($_SESSION['id']) == null || 0   ){

            header("location: ../index.html");
            
        }

       
        include ("../htdoc/crud.php");


        $db = new Usuario($_SESSION['id']);
        $nome = $db->GetNome();
        $nome_social = $db->GetNome_Social();
        $endereco = $db->GetEndereco();
        $medio = $db->GetEscolaridade();
        $telefone = $db->GetTelefone();
        $data_nacimento = $db->GetData();
        $email = $db->GetEmail();
       



      ?>

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="meuestilo.css">

    </head>

    <body>

      <header>
        <img width="300px;" height="100px"  alt="logo" src="../images/acon.png">
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <img src="../images/ACON(1).png" width="150px" height="150px" style="border-radius: 100px; border: solid 1px gray;" >
          <a href="#">Inicio</a>
          <a href="#">Conta</a>
          <a href="#">Equipe</a>
          <a href="#">Ingressos</a>
          <a href="../htdoc/logoff.php">Sair</a>
        </div>
        <div id="main">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        </div>
        <script>
          function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
          }

          function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            document.body.style.backgroundColor = "white";
          }
        </script>

      </header>





      <form method="POST"  >
        <fieldset>
          <legend>Dados Cadastrais</legend>

          <div class="form-group">
                                    <label for="nome">Nome Completo:</label><br>
                                    <input name="nome" class="form-control" placeholder="<?php echo $nome; ?>" type="text" required id="nome">
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <label for="nome_social">Nome Social:</label><br> 
                                    <input name="nome_social" class="form-control" placeholder="<?php echo $nome_social; ?>" type="text" id="nome_social">
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <label for="email">E-mail:</label> <br>
                                    <input name="email" class="form-control" placeholder="<?php echo $email; ?>" type="email" required autofocus id="email" disabled="">
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <label for="senha">Senha:</label> <br>
                                    <input name="senha" class="form-control" placeholder="********" type="password" required minlength="8" id="senha">
                                </div> <!-- form-group// -->    
                                <div class="form-group">
                                    <label for="escolaridade"></label> <?php echo $medio ?>:<br>
                                    <select name="escolaridade" id="escolaridade">
                                        <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                                        <option value="Ensino Fundamental">Ensino Fundamental</option>
                                        <option value="Ensino Medio Incompleto">Ensino Medio Incompleto</option>
                                        <option value="Ensino Medio">Ensino Medio</option>
                                        <option value="Ensino Técnico Incompleto">Ensino Técnico Incompleto</option>
                                        <option value="Ensino Técnico">Ensino Técnico</option>
                                        <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                                        <option value="Ensino Superior">Ensino Superior</option>
                                    </select>
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <label for="data_nacimento">Data de Nacimento:</label> <br>
                                    <input type="date" value="<?php echo $data;?>" disabled>
                                    <input name="data_nacimento" class="form-control"  VALUE="2019-06-06" type="date" id="data_nacimento">
                                    <script type="text/javascript">
                                      var datecontrol = document.querySeletector('input[type="data_nacimento"]');
                                      datecontrol.value = '<?php echo $data;?>'
                                    </script>
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <label for="endereco">Endereço:</label> <br>
                                    <input name="endereco" class="form-control" placeholder="<?php echo $endereco; ?>" type="text" required id="endereco">
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <label for="Telefone">Telefone:</label><br>
                                    <input name="Telefone" class="form-control" placeholder="<?php echo $telefone; ?>" type="tel" minlength="11" maxlength="11" required id="Telefone">
                                </div> <!-- form-group// -->
                            
                                                              
                                
                                            <button type="submit" class="btn btn-outline-dark">Alterar Dados</button>
                                            <form action="" method="POST">
                                              <button type="submit" class="btn btn-outline-dark">Apagar a Conta</button>
                                            </form>
                                            
                                                                                             
        </fieldset>
                                          
      </form>


      <?php
        if(isset($_POST['nome'])){
            echo $_POST['nome'];

        }




      ?>














      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

  </html>