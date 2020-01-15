<!DOCTYPE html>

<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/orcamentos.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/07e70fc1d9.js" crossorigin="anonymous"></script>
    </head>


    <body>
        <div class="container-fluid d-flex flex-column" style="min-height: 100vh;">
            <div class="row" style="background: #f7f8f8; padding: 10px; border-bottom: solid #777777 3px;">
                <div style="border-left: solid #1fbf76 4px; padding: 0 30px; margin-left: -10px; font-size: 24px; color: #1fbf76;">Nosso principais orçamentos</div>
                <!--<div>Caixa de sele��o</div>-->

            </div>
            <div class="row d-flex" style="background:lightgrey; padding: 15px 0; flex-grow:1;">

            <?php
                $lista = array(
                    0 => array(
                        "title" => "INTRO PLAN",
                        "itens" => 1,
                        "price" => "R$399,90",
                        "plano" => "Mensais"
                    ),
                    1 =>array(
                        "title" => "STANDARD PLAN",
                        "itens" => 3,
                        "price" => "R$1.099,90",
                        "plano" => "Mensais"
                    ),
                    2 =>array(
                        "title" => "MASTER PLAN",
                        "itens" => 5,
                        "price" => "R$14.299,90",
                        "plano" => "Anuais"
                    ),
                    3 => array(
                        "title" => "PARTNER PLAN",
                        "itens" => 6,
                        "price" => "R$16.799,90",
                        "plano" => "Anuais"
                    ),
                );
                for($x=0; $x<count($lista); $x++){
                    
                    ?>
                    <div class="col-3 d-flex flex-column" style=" padding: 0 10px; flex-grow: 1;">
                        <div class="d-flex flex-column pt-0" style="flex-grow:1; padding: 10px; border-radius: 20px; overflow: hidden; background: #f7f8f8;" >
                            <div class="title btn-gradient-inverse" style="padding: 10px; color: #f7f8f8;font-size: 24px; font-weight: 800; text-align: center; margin: 0 -15px; "><span class="textshadow"> <?=$lista[$x]["title"]?> </span> </div>
                            <div class="itens" style="flex-grow: 1; ">
                                <?php
                                    for($y=0; $y<$lista[$x]["itens"]; $y++){
                                        
                                        ?>
                                        <div class="item d-flex justify-content-between align-items-center p-3" style="margin:10px 0; background: #eeeeee  ; border: solid #bbbbbb 1px; border-radius: 5px;" >
                                            <i class="fas fa-check-circle mr-3" style="color: #1fbf76;"></i>
                                            <div class="text" style="text-align: justify; line-height: 1.2; font-size: 0.8em;">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</div>
                                        </div>
                                        <?php
                                    }
                                ?>
                                
 
                            </div>
                            <div class="price d-flex justify-content-between align-items-center" style="padding: 10px 20px; border-radius: 20px; background: lightgrey;">
                                <i class="fas fa-money-bill-wave-alt" style="color: #1fbf76;"></i>
                                <div class="text" style="line-height: 1;">
                                    <div style="font-size: 20px; font-weight: 600;"><?=$lista[$x]["price"]?></div>
                                    <div style="font-size: 0.9em; font-weight: 500;text-align: right; line-height: 1.2;"><?=$lista[$x]["plano"]?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    
                }
            
            ?>
                
            </div>
            <div class="row" style="background: lightgrey;"> 
                <div style="padding: 15px; background-color: #f7f8f8; margin: 15px; flex-grow: 1;">
                    <div><span style="color: #1fbf76; font-size: 18px;font-weight: bold;">Alguma dúvida? </span> Manda agora mesmo para sanar qualquer questão</div>
                    <div class="d-flex" style="margin-top: 10px;">
                        <input style="max-width: 70%; margin-right: 10px;" placeholder="Escreva aqui (max 300 caracteres)" type="text" class="form-control" id="msg" name="msg"/>
                        <button class="btn btn-gradient-inverse" type="submit" style="padding: 0 30px; color: #f7f8f8; font-weight: bold;">Enviar</button>
                    </div>
                </div>
            </div>

        </div>

    </body>


</html>