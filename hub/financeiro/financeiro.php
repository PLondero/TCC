

<?php
    session_start();
    include('../../php/conexao.php');    
    date_default_timezone_set('America/Sao_Paulo');
?>


<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Educação Financeira</title>
        <link rel="stylesheet" href="../../Pagprincipal/pagprin.css">
        <link rel="stylesheet" href="../nav.css">
        <link rel="stylesheet" href="financeiro.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <div class="container">
           <nav>   
                <Img src="../../imgeral/EDUCA (50 x 50 px).png">
                    <hr width="50px">
                        <ul class="icones">
                            <li class="home"> 
                                <div>
                                    <a href="../dashboard/dashboard.php">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16" color="white" class="i">
                                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                                    <h1> Início</h1>
                                
                            </li>

                            <li class="financeiro"> 
                                <div>
                                    <a href="../financeiro/financeiro.php">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16" color="white" class="i">
                                                <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                                <h1>Financeiro</h1>
                               
                            </li>
                            <li class="planejamento"> 
                                <div></div>
                                <a href="../planejamento/planejamento.php">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-backpack" viewBox="0 0 16 16" color="white" class="i">
                                            <path d="M4.04 7.43a4 4 0 0 1 7.92 0 .5.5 0 1 1-.99.14 3 3 0 0 0-5.94 0 .5.5 0 1 1-.99-.14M4 9.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm1 .5v3h6v-3h-1v.5a.5.5 0 0 1-1 0V10z"/>
                                            <path d="M6 2.341V2a2 2 0 1 1 4 0v.341c2.33.824 4 3.047 4 5.659v5.5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5V8a6 6 0 0 1 4-5.659M7 2v.083a6 6 0 0 1 2 0V2a1 1 0 0 0-2 0m1 1a5 5 0 0 0-5 5v5.5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5V8a5 5 0 0 0-5-5"/>
                                        </svg>
                                    </button>
                                </a>
                                <H1> Planejamento</H1>
                            </li>
                            <li>
                            <div class="calendario" >
                                <a href="../historico/historico.php">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16" color="white" class="i">
                                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                        </svg>
                                    </button>
                                </a>
                                <h1>Extrato</h1>
                            </div>
                            </li>
                        </ul>
                        
                    </li>
            </nav>
             <section class="dashboard">
                <h1 class="Titulo"> Financeiro </h1>
                <div class="boxes">
                    <div class="box" id="box1">
                        <p> <?php echo date("d/m/Y"); ?> </p>
                        <h1> <?php echo $conn->query("SELECT saldo FROM usuarios WHERE id_usuario={$_SESSION["id_usuario"]}")->fetch_assoc()["saldo"]?> </h1>
                    </div>  
                </div>
                <div class="boxes2">
                    <div class="box" id="box3">
                        <form method="post" action="handler.php">
                            <h1> Receitas Fixas:</h1>
                            <label>
                                <input type="text" name="razao" placeholder="razao"> 
                            </label><br><br>
                            <label>
                                <input type="number" name="valor" placeholder="salário"> 
                            </label><br><br>
                            <label>
                                <p> Dia de receber</p>
                                <input type="number" name="dia">
                            </label>
                            <button type="submit"> Salvar</button>
                        </form>
                    </div>
                    <div class="box" id="box3">
                        <form method="post" action="handler.php">
                            <h1> Despesas fixas:</h1>
                            <Label>
                                <input type="text" name="razao" placeholder="conta"> 
                            </Label><br><br>
                            <Label> 
                                <input type="number" name="valor" placeholder="custo">
                                <input type="hidden" name="tipo" value="-1"> 
                            </Label><br><br>
                            <label>
                                <p> Dia de pagamento </p>
                                <input type="number" name="dia">
                            </label>
                            <button type="submit"> Salvar</button>
                        </form>
                    </div>
                    <div class="box" id="box3">
                        <form method="post" action="handler.php">
                            <h1> Receitas adicionais:</h1>
                            <Label>
                                <input type="text" name="razao" placeholder="razao"> 
                            </Label><br><br>
                            <Label> 
                                <input type="text" name="valor" placeholder="valor"> 
                            </Label><br><br>
                            <label>
                                <p> Dia que recebeu </p>
                                <input type="date" name="data_entrada">
                            </label>
                            <button type="submit"> Salvar</button>
                        </form>
                    </div>
                    <div class="box" id="box3">
                        <form method="post" action="handler.php">
                            <h1> Despesas adicionais</h1>
                            <Label>
                                <input type="text" name="razao" placeholder="razao"> 
                            </Label><br><br>
                            <Label> 
                                <input type="text" name="valor" placeholder="valor"> 
                                <input type="hidden" name="tipo" value="-1">
                            </Label><br><br>
                            <label>
                                <p> Dia que pagou </p>
                                <input type="date" name="data_entrada">
                            </label>
                            <button type="submit"> Salvar</button>
                        </form>
                    </div>
                </div>

                <div class="boxes3">
                    <div class="box2">
                       <h1>Contas a pagar:</h1>
                        <p>
                            <?php
                                $result = $conn->query("SELECT razao, valor, dia FROM valores_fixos WHERE id_usuario={$_SESSION["id_usuario"]} AND valor < 0 ORDER BY dia ASC");
                                if ($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo "<div class='conta'> <p>" . $row["razao"] . " - R$ " . $row["valor"] . " - Dia: " . $row["dia"] . "</p> <button class='button'> Pagar </button> </div>";
                                        
                                    }
                                } else {
                                    echo "<p> Nenhuma conta a pagar </p>";
                                }
                            ?>
                        </p>
                    </div>
                </div>
                

            </section>
        </div>
</body>
</html>