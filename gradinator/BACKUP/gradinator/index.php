<?php
echo '
<!DOCTYPE html>
<html lang="pt-br">';

include "module/head.php";

echo '<body>
        <!-- Content -->
        <div class="cd-hero">

            <!-- Navigation -->        
            <div class="cd-slider-nav">
                <nav class="navbar">
                    <div class="tm-navbar-bg">
                        
                        <a class="navbar-brand text-uppercase" href="#"><img src="img/logo1.png" style="margin-left: -46px;margin-right: 71px;"></i></a>

                        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                            &#9776;
                        </button>
                        <div class="collapse navbar-toggleable-md text-xs-center text-uppercase tm-navbar" id="tmNavbar">
                            <ul class="nav navbar-nav">
                                <li class="nav-item active selected">
                                    <a class="nav-link" href="#0" data-no="1">Gradinator<span class="sr-only">(current)</span></a>
                                </li>                                
                                <li class="nav-item">
                                    <a class="nav-link" href="#0" data-no="2">O Projeto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#0" data-no="3">Links Úteis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#0" data-no="4">Login</a>
                                </li>
                            </ul>
                        </div>                        
                    </div>
                </nav>
            </div> 

            <ul class="cd-hero-slider">

                <!-- Page 1  -->
                <li class="selected">                
                    <div class="cd-full-width">
                        <div class="container-fluid js-tm-page-content" data-page-no="1" data-page-type="gallery">
                            <div class="tm-img-gallery-container">
                                <div class="tm-img-gallery gallery-one">

                                <!-- Formulário PHP -->                                    
                                    <form action="../apigrade/get6.0.php" method="post">
                                       <div style="margin-left: -174px;">
                                       <p><h1 style="margin-bottom: -3.5rem; font-size:30px; font-weight: 700;">Cursos</h1></p>

                                          <input id="box" type="text" name="courses" placeholder="&nbsp;&nbsp;Nome do curso" />
                                          
                                          <button id="buttonok" type="submit" style="font-weight: 700;">ok</button>
                                       </div>
                                       <div style="margin-left: 447px;margin-right: -400px;margin-top: -205px;">
                                       <p><h1 style="font-size: 32px; font-weight: 700;margin-bottom: -3.5rem;">Horários</h1></p>
                                       <p><h5 style="font-size: 15px;">Clique nos horários de entrada e saída da faculdade ou no X para excluir o dia.</h5></p>
                                       <table id="myTable" style="width:100%; color:#344253;">
                                         <tr>
                                           <td style="font-size: 18px; font-weight: 500;">Segunda &nbsp;</td>
                                           <td id="box1">
                                           <button id="box3" type="submit">7</button>
                                           <button id="box3" type="submit">8</button>
                                           <button id="box3" type="submit">9</button>
                                           <button id="box3" type="submit">10</button>
                                           <button id="box3" type="submit">11</button>
                                           <button id="box3" type="submit">12</button>
                                           <button id="box3" type="submit">13</button>
                                           <button id="box3" type="submit">14</button>
                                           <button id="box3" type="submit">15</button>
                                           <button id="box3" type="submit">16</button>
                                           <button id="box3" type="submit">17</button>
                                           <button id="box3" type="submit">18</button>
                                           <button id="box3" type="submit">19</button>
                                           <button id="box3" type="submit">20</button>
                                           <button id="box3" type="submit">21</button>
                                           <button id="box3" type="submit">22</button>
                                           </td>
                                            <button id="buttonx" onclick="myFunction()" style="left: 1096px;bottom: -30px;font-weight: 700;">X</button>
                                         </tr>
                                         <tr>
                                          <td>
                                          &nbsp;
                                          </td>
                                         </tr>
                                         <tr>
                                           <td style="font-size: 18px; font-weight: 500;">Terça</td>
                                           <td id="box1">
                                           <button id="box3" type="submit">&nbsp;7</button>
                                           <button id="box3" type="submit">8</button>
                                           <button id="box3" type="submit">9</button>
                                           <button id="box3" type="submit">10</button>
                                           <button id="box3" type="submit">11</button>
                                           <button id="box3" type="submit">12</button>
                                           <button id="box3" type="submit">13</button>
                                           <button id="box3" type="submit">14</button>
                                           <button id="box3" type="submit">15</button>
                                           <button id="box3" type="submit">16</button>
                                           <button id="box3" type="submit">17</button>
                                           <button id="box3" type="submit">18</button>
                                           <button id="box3" type="submit">19</button>
                                           <button id="box3" type="submit">20</button>
                                           <button id="box3" type="submit">21</button>
                                           <button id="box3" type="submit">22</button>
                                           </td>
                                           <button id="buttonx" onclick="myFunction()" style="left: 1051px;bottom: -87px;font-weight: 700;">X</button>
                                         </tr>
                                         <tr>
                                          <td>
                                          &nbsp;
                                          </td>
                                         </tr>
                                         <tr>
                                           <td style="font-size: 18px; font-weight: 500;">Quarta</td>
                                           <td id="box1">
                                           <button id="box3" type="submit">&nbsp;7</button>
                                           <button id="box3" type="submit">8</button>
                                           <button id="box3" type="submit">9</button>
                                           <button id="box3" type="submit">10</button>
                                           <button id="box3" type="submit">11</button>
                                           <button id="box3" type="submit">12</button>
                                           <button id="box3" type="submit">13</button>
                                           <button id="box3" type="submit">14</button>
                                           <button id="box3" type="submit">15</button>
                                           <button id="box3" type="submit">16</button>
                                           <button id="box3" type="submit">17</button>
                                           <button id="box3" type="submit">18</button>
                                           <button id="box3" type="submit">19</button>
                                           <button id="box3" type="submit">20</button>
                                           <button id="box3" type="submit">21</button>
                                           <button id="box3" type="submit">22</button>
                                           </td>
                                           <button id="buttonx" onclick="myFunction()" style="left: 1006px;bottom: -141.183px;font-weight: 700;">X</button>
                                         </tr>
                                         <tr>
                                          <td>
                                          &nbsp;
                                          </td>
                                         </tr>
                                         <tr>
                                           <td style="font-size: 18px; font-weight: 500;">Quinta</td>
                                           <td id="box1">
                                           <button id="box3" type="submit">&nbsp;7</button>
                                           <button id="box3" type="submit">8</button>
                                           <button id="box3" type="submit">9</button>
                                           <button id="box3" type="submit">10</button>
                                           <button id="box3" type="submit">11</button>
                                           <button id="box3" type="submit">12</button>
                                           <button id="box3" type="submit">13</button>
                                           <button id="box3" type="submit">14</button>
                                           <button id="box3" type="submit">15</button>
                                           <button id="box3" type="submit">16</button>
                                           <button id="box3" type="submit">17</button>
                                           <button id="box3" type="submit">18</button>
                                           <button id="box3" type="submit">19</button>
                                           <button id="box3" type="submit">20</button>
                                           <button id="box3" type="submit">21</button>
                                           <button id="box3" type="submit">22</button>
                                           </td>
                                           <button id="buttonx" onclick="myFunction()" style="left: 961px;bottom: -197px;font-weight: 700;">X</button>
                                         </tr>
                                         <tr>
                                          <td>
                                          &nbsp;
                                          </td>
                                         </tr>
                                         <tr>
                                           <td style="font-size: 18px; font-weight: 500;">Sexta</td>
                                           <td id="box1">
                                           <button id="box3" type="submit">&nbsp;7</button>
                                           <button id="box3" type="submit">8</button>
                                           <button id="box3" type="submit">9</button>
                                           <button id="box3" type="submit">10</button>
                                           <button id="box3" type="submit">11</button>
                                           <button id="box3" type="submit">12</button>
                                           <button id="box3" type="submit">13</button>
                                           <button id="box3" type="submit">14</button>
                                           <button id="box3" type="submit">15</button>
                                           <button id="box3" type="submit">16</button>
                                           <button id="box3" type="submit">17</button>
                                           <button id="box3" type="submit">18</button>
                                           <button id="box3" type="submit">19</button>
                                           <button id="box3" type="submit">20</button>
                                           <button id="box3" type="submit">21</button>
                                           <button id="box3" type="submit">22</button>
                                           </td>
                                           <button id="buttonx" onclick="myFunction()" style="left: 916px;bottom: -253px;font-weight: 700;">X</button>
                                         </tr>
                                       </table>
                                       </div>    
                                </div>
                                <div style="margin-left: 562px;margin-top: 48px;">
                                       <label for="msg" style="font-size:20px;">Intervalo de almoço:&nbsp;&nbsp;</label>
                                       <select id="box2">
                                          <option value="30m">&nbsp;&nbsp;30 minutos</option>
                                          <option value="1h">&nbsp;&nbsp;1 hora</option>
                                          <option value="1h30m">&nbsp;&nbsp;1 h e 30 minutos</option>
                                          <option value="2h">&nbsp;&nbsp;2 horas</option>
                                          <option value="2h30m">&nbsp;&nbsp;2 h e 30 minutos</option>
                                          <option value="3h">&nbsp;&nbsp;3 horas</option>
                                       </select>
                                       </div>
                                       <div style="margin-left: 1147px;margin-top: -33px;margin-right: -161px;">
                                       <label for="msg" style="font-size:20px;">Intervalo da janta:&nbsp;&nbsp;</label>
                                       <select id="box2">
                                          <option value="30m">&nbsp;&nbsp;30 minutos</option>
                                          <option value="1h">&nbsp;&nbsp;1 hora</option>
                                          <option value="1h30m">&nbsp;&nbsp;1 h e 30 minutos</option>
                                          <option value="2h">&nbsp;&nbsp;2 horas</option>
                                          <option value="2h30m">&nbsp;&nbsp;2 h e 30 minutos</option>
                                          <option value="3h">&nbsp;&nbsp;3 horas</option>
                                       </select>
                                       </div>
                                       <div style="font-size:20px;margin-left: -161px;">
                                         <input type="range" id="a" name="a" value="0" min="1" max="15" oninput="x.value=parseInt(a.value)" style="margin-bottom: -53px;margin-left: 0px;margin-right: -260px;">
                                        Limite de até
                                        <output id="box4" name="x" for="a">1</output>
                                        matérias
                                        </div>
                                        <div>
                                        <button id="buttonnextr" type="submit" style="margin-left: 1490px;bottom: -66px;font-weight: 700;">Avançar</button>
                                        </div>
                                    </form>                                 
                            </div>
                        </div>                                                    
                    </div>                    
                </li>

                <!-- Page 2  -->
                <li>                  
                    <div class="cd-full-width">
                        <div class="container-fluid js-tm-page-content" data-page-no="2" data-page-type="gallery">
                            <div class="tm-img-gallery-container">
                                <div class="tm-img-gallery gallery-two">
                                    <div class="tm-img-gallery-info-container">                                    
                                        <h2 class="tm-text-title tm-gallery-title"><span class="tm-white"></span></h2>
                                          <div>
                                          <span style="margin-left: -260px;margin-top: -100px;"><img src="img/Infograficos.png" style="margin-bottom: 80px;margin-left: 95px;">
                                          </span>
                                          </div>
                                          <div style="margin-left: 1482px;margin-right: -1034px;margin-top: 0px;padding-top: 0px;">
                                            <img src="img/down.png" onclick="scrollWin(0, 1050)" title="Scroll Down" style="bottom: -229px;margin-top: -444px;margin-bottom: -83px;"></button><br><br>
                                          </div>
                                          <script>
                                           function scrollWin(x, y) {
                                             window.scrollBy(x, y);
                                          } 
                                          </script>
                                          <div>
                                            <h2 style="font-size: 40px;margin-left: -169px;">Equipe</h2>
                                          </div>
                                          <div style="margin-left: -193px;margin-right: -826px;">
                                            <span class="dot" style="margin-right: 280px;"></span>
                                            <span class="dot" style="margin-right: 280px;"></span>
                                            <span class="dot" style="margin-right: 280px;"></span>
                                            <span class="dot" style="margin-right: 0px;"></span>
                                          </div>
                                          <div style="margin-top: -127px;margin-right: -855px;margin-left: -190px;">
                                            <img src="img/chiquinho.png" style="margin-right: 300px;margin-left: 4px;margin-top: 2px;">
                                            <img src="img/bichinha.png" style="margin-right: 300px;margin-left: -5px;margin-top: 2px;">
                                            <img src="img/bichinho.png" style="margin-right: 300px;margin-top: 2px;margin-left: -7px;">
                                            <img src="img/eu.png" style="margin-left: -6px;margin-top: 2px;">
                                          </div>
                                          <div style="margin-left: -39px;margin-top: -86px;margin-right: -830px;">
                                            <div>
                                            <h1><b>Francisco</b></h1>
                                            <h3>Orientador</h3>
                                            </div>
                                            <div style="margin-top: -56px;margin-right: -42px;margin-left: 412px;">
                                            <h1><b>Jéssica</b></h1>
                                            <h3>Designer</h3>
                                            </div>
                                            <div style="margin-top: -56px;margin-left: 826px;">
                                            <h1><b>Igor</b></h1>
                                            <h3>Programador</h3>
                                            </div>
                                            <div style="margin-top: -56px;margin-left: 1241px;">
                                            <h1><b>Victor Calazans</b></h1>
                                            <h3>Programador</h3>
                                            </div>
                                          </div>
                                          <div style="margin-top: 147px;margin-left: -165px;">
                                            <h1 style="font-size: 40px;"><b>Sobre nós</b></h1>
                                            <br>
                                            <h5 style="font-size: 16px;padding-right: 108px;margin-left: 2px;">Somos um grupo de pesquisa que busca aliviar as dores dos estudantes dos BIs quanto às matrículas semestrais através da tecnologia, principalmente com o uso de Inteligência Artificial (IA). <br><br><br>Nossa sede é no Ihac Lab-i e estamos sempre abertos à visitação! :)</h5>
                                          </div>
                                          <div style="margin-right: -871px;margin-left: 733px;margin-top: -165px;">
                                            <h1 style="font-size: 40px;"><b>Nossa Pesquisa</b></h1>
                                            <div>
                                              <img src="img/buttompdf.png" style="margin-bottom: -144px;margin-left: -12px;">
                                              <h5 style="font-size: 16px;margin-top: 98px;">Funcionamento<br> do gradinator</h5>
                                            </div>
                                            <div>
                                              <img src="img/buttompdf.png" style="margin-top: -182px;margin-left: 225px;">
                                              <h5 style="font-size: 16px;margin-top: -63px;margin-left: 207px;">Requisitos dos estudantes<br> para escolha da matrícula<br> semestral</h5>
                                            </div>
                                            <div>
                                              <img src="img/buttompdf.png" style="margin-left: 466px;margin-top: -216px;">
                                              <h5 style="font-size: 16px;margin-left: 473px;margin-top: -81px;">Manual da marca<br> Minha Grade IA</h5>
                                            </div>
                                          </div>
                                          <div style="margin-top: 39px;">
                                            <h1 style="font-size: 40px;"><b style="margin-left: -161px;">Parceiros</b></h1>
                                            <div style="margin-left: -8px;margin-top: 48px;">
                                              <a href="https://proae.ufba.br/" target="_blank"><img src="img/proae.png" style="margin-right: 75px;margin-left: -150px;"></a>
                                              <a href="http://www.ihac.ufba.br/" target="_blank"><img src="img/ihacc.png" style="margin-right: 75px;"></a>
                                              <a href="http://www.belasartes.ufba.br/" target="_blank"><img src="img/belas.png"></a>
                                            </div>
                                          </div>
                                          <div style="margin-right: -930px;margin-left: 1484px;">
                                            <img src="img/up.png" onclick="scrollWin(0, -1050)" title="Scroll Up" style="bottom: -229px;margin-top: -115px;"></button>
                                          </div>
                                        </p>
                                    </div>
                                </div>                                 
                            </div>
                        </div>                      
                    </div>
                </li>

                <!-- Page 3 -->
                <li>
                    <div class="cd-full-width">
                        <div class="container-fluid js-tm-page-content" data-page-no="3" data-page-type="text">                    
                            <div class="tm-img-gallery-container">
                                <div>
                                    <div class="tm-img-gallery-info-container">                                   
                                        <h2><span><b style="padding-left: 0px;margin-left: -197px; font-size: 40px;margin-bottom: 2px;margin-top: 0px;position: relative;top: 37px;">Colegiados</b></span></h2>
                                        <div class="div1" style="margin-left: -193px; font-size: 23px;margin-right: 136px;position: relative;top: 34px;">Caso tenha dúvidas relativas à sua matricula (incluindo não saber quais matérias pegar), seu colegiado irá te oferecer total suporte.<br><br> O Minha Grade IA não substitui o auxílio especializado do seu colegiado.</b></div>
                                        <div class="moves">
                                        <table style="width:100%;margin-left: -76px;margin-top: 59px;">
                                          <tr>
                                            <th></th>
                                            <th></th> 
                                            <th></th>
                                          </tr>
                                          <tr>
                                            <td style="padding-left: 159px;"><h2><b class="letra">Saúde<b></h2></td>
                                            <td><pre class="move1"><b>Segunda</b><br>14:30 - 17:30<br>PAF V 207</td></pre>
                                            <td><pre class="move2"><b>Quarta</b><br>14:30 - 17:30<br>PAF V 207</td></pre>
                                          </tr>
                                          <tr>
                                            <td style="padding-left: 75px;"><h2><b class="letra">Tecnologia<b></h2></td>
                                            <td><pre class="move1"><b>Quarta</b><br>14:30 - 17:30<br>PAF V 207</td></pre>
                                                <td><pre class="move2"><b>Terça</b><br>14:30 - 17:30<br>PAF V 207</td></pre>
                                                <td><pre class="move3"><b>Terça</b><br>14:30 - 17:30<br>PAF V 207</td></pre>
                                          </tr>
                                          <tr>
                                            <td style="padding-left: 16px;"><h2><b class="letra">Humanidades<b></h2></td>
                                            <td><pre class="move1"><b>Terça</b><br>14:30 - 17:30<br>PAF V 207</td></pre>
                                            <td><pre class="move2"><b>Terça</b><br>14:30 - 17:30<br>PAF V 207</td></pre>
                                            <td><pre class="move3"><b>Terça</b><br>14:30 - 17:30<br>PAF V 207</td></pre>
                                                <td><p><pre class="move"><b>Quinta</b><br>14:30 - 17:30<br>PAF V 207</p></td></pre>
                                          </tr>
                                            <tr>
                                            <td style="padding-left: 180px;"><h2><b class="letra">Artes<b></h2></td>
                                            <td><pre class="move1"><b>Segunda</b><br>14:30 - 17:30<br>PAF V 207</td></pre>
                                                <td><pre class="move2"><b>Quarta</b><br>14:30 - 17:30<br>PAF V 207</td></pre>
                                          </tr>
                                        </table>
                                    </div>
                                        <h2>
                                        	<b><h2 class="letra3" style="padding-left: 0px;margin-left: -199px;margin-bottom: -8%;font-size: 40px;">Outros locais de informação</h2></b>
                                        </h2>
                                        <div>
                                        	<span style="position: relative;right: -79px;top: 84px;"><a href="https://siac.ufba.br/SiacWWW/Welcome.do" target="_blank"><img src="img/SIAC.png" title="SIAC"></a>
                                          </span>
                                          <span style="position: relative;right: 412px;top: 83px;"><a href="https://www.meuhorarioufba.com.br/" target="_blank"><img src="img/SUPAC.png" title="SUPAC"></a>
                                          </span>  
                                          <span style="position: relative;right: -342px;top: 81px;"><a href="https://www.meuhorarioufba.com.br/" target="_blank"><img src="img/UFBA.png" title="HORÁRIO"></a>
                                          </span>  
                                          <span style="position: relative;right: -393px;top: 12px;"><a href="https://www.meuhorarioufba.com.br/" target="_blank"><img src="img/IHAC.png" title="IHAC"></a>
                                          </span>  
                                          <span style="position: relative;right: -816px;top: 9px;"><a href="https://www.facebook.com/groups/1819551931653350/" target="_blank"><img src="img/N.png" title="GRUPO_FACEBOOK"></a>
                                          </span>
                                          <span style="position: relative;right: -936px;top: 9px;"><a href="https://docs.google.com/document/d/1W1rDqBOZPBLv9kD0bExxrcVnmyTOXbviL9LaN7kyMBs/mobilebasic" target="_blank"><img src="img/DOC.png" title="DOC"></a>
                                            </span>
                                        <div style="margin-top: 0px;">
                                            <div class="row" style="margin-right: -110.937rem;">
                                          <div class="column">
                                            <a href="https://supac.ufba.br/" target="_blank"><h1><b></b></h1></a>
                                            <b><br>Aqui você pode encontrar a lista semestral completa das matérias disponíveis aos BIs.</</b>
                                          </div>
                                          <div class="column">
                                            <a href="https://siac.ufba.br/SiacWWW/Welcome.do" target="_blank"><h1><b></b></h1></a>
                                            <b><br>Aqui você pode encontrar todas as matérias de todos os cursos da UFBA, com suas informações completas.</b>
                                          </div>
                                          <div class="column">
                                            <a href="http://forma.ihac.net.br" target="_blank"><h1><b></b></h1></a>
                                            <b><br>Aqui você pode calcular o quanto falta para você se formar.</b>
                                          </div>
                                          <div class="column">
                                            <h2></h2>
                                            <b class="ggwp1"><br><br>Aqui você pode montar sua própria grade, escolhendo manualmente as matérias que você quer pegar.</b>
                                          </div>
                                            <div class="column">
                                            <a href="https://www.facebook.com/groups/1819551931653350/" target="_blank"><h1 style="margin-top: 3px;"><b></b></h1></a>
                                            <b class="ggwp"><br>Um grupo do Facebook onde pode-se conversar com outros alunos sobre os melhores professores e matérias.</b>
                                          </div>
                                            <div class="column">
                                            <a href="https://docs.google.com/document/d/1W1rDqBOZPBLv9kD0bExxrcVnmyTOXbviL9LaN7kyMBs/mobilebasic" target="_blank"><h1 style="margin-top: 3px;"><b></b></h1></a>
                                            <b class="ggwp"><br>Um doc compartilhado onde alunos colocam suas opiniões a respeito dos professores do IHAC e suas matérias.</b>
                                          </div>
                                        </div>
                                        </div>
                                   <div class=""></div>
                                   <div class="v2"></div>
                                   <div class="v3"></div>
                                   <div class="v4"></div>
                                   <div class="v5"></div>
                                   <div class="v6"></div>
                                   <div><img src="img/rr.png" style="margin-top: -948px;margin-right: 6px;padding-right: 0px;position: relative;right: -1161px;"></div>
                                   <div><img src="img/rr2.png" style="margin-top: -996px;margin-right: 6px;padding-right: 0px;position: relative;right: -874px;"></div>
                                   <div><hr style="position: relative;top: -609px; margin-right: -760px;margin-left: 730px;margin-top: 0rem;"></div>
                                   <div><hr style="position: relative;top: -440px;margin-top: -9.5rem;margin-right: -760px;margin-left: 730px;"></div>
                                   <div><hr style="position: relative;top: -236px;margin-top: -12.5rem;margin-right: -760px;margin-left: 730px;"></div>
                                   <div class="ggwp2"><img src="img/nobrain.png"></div>
                                   <div class="ggwp3"><img src="img/nobraintwo.png"></div>
                                    </div>                                                                                       
                                </div>                                 
                            </div>
                        </div>         
                    </div>  
                </li>

                <!-- Page 4 About -->
                 <li>
                    <div class="cd-full-width">
                        <div class="container-fluid js-tm-page-content" data-page-no="4" data-page-type="text">                    
                            <div class="tm-img-gallery-container">
                                <div>
                                    <div class="tm-img-gallery-info-container">                                   
                                        <h2><span><b style="padding-left: 0px;margin-left: -197px; font-size: 33px;margin-bottom: 2px;margin-top: 0px;position: relative;top: 37px;">[TEXTO]</b></span></h2>
                                        <div class="div1" style="margin-left: -193px; font-size: 23px;margin-right: 136px;position: relative;top: 34px;"></b></div>        
                                </div>                                 
                            </div>
                        </div>         
                    </div>  
                </li>';

include "module/footer.php";

include "module/preloader.php";            

include "module/script.php";
?>