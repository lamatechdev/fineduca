<style>

	.submeter{
		padding: 12px;
		color:white !important;
		background: #FF8E1D;
		transition: all 1s;
		margin: 20px 0;
	}

	.submeter:hover{
		background: #d06800;
		transition: all 1s;
		color:white;
	}

	.encontro p{
		word-wrap:  break-word;
	}

	#map{
		width: 80%;
		margin: 20px auto;
		height: 400px;
	}

	.text-center{
		text-align: center;
	}

	.localizacao{
		width:100%;
		background:#182c69;
		width:100%;
		height:auto;
		padding-top:10px;
		padding-bottom: 40px;
		margin-bottom: 20px;
	}

	.palestrantes{
		width: 100%;
		height: auto;
	}

	.row{
		box-sizing: border-box;
	}
	.row:before,
	.row:after {
	  content: " ";
	  display: table;
	}
	 
	.row:after {
	  clear: both;
	}

	.column-2{
		width: 15.3333333333%;
		height: auto;
	}

	.column-3 {
	  	width: 23.8%;
	  	height: auto;
	}

	.column-4{
		width: 32.2666666667%;
		height: auto;
	}

	.column-6 {
	  	width: 49.2%;
		height: auto;
	}

	.column{
		box-sizing: border-box;
		position: relative;
  		float: left;
	}

	.column a img{
		width: 100%;
		height: auto;
		border-radius:100%;
		border: 5px solid #CCC;
		transition: all 1s;
	}

	.column a:hover img{
		opacity: 0.7;
		transition: all 1s;
	}

	.column + .column {
    	margin-left: 1.6%;
  	}

	.localizacao p{
		color: white;
	}

	.red{
		color:red;
	}

    thead tr {background-color: #5C6995; color: #FFF;}
	
	tbody tr:nth-child(even) {background-color: #CACDDC}
	/*tbody tr:hover {background-color: #D06800}*/

</style>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Tortuga
 */

get_header('encontro'); ?>
	<section id="sobre">
	<div id="content" class="site-content container clearfix">
		<div class="encontro">
			<div class="type-page">
				<h1 class="page-title">SOBRE</h1>
				<p>Nos dias <strong>24 e 25 de agosto de 2017</strong> ocorrerá o <strong>V</strong> Encontro da Associação Nacional de Pesquisa em Financiamento da Educação - FINEDUCA, em <strong>Natal-RN</strong>, no Centro de Educação na Universidade Federal do Rio Grande do Norte. O tema central é <strong>"Direito à Educação em um contexto de desmonte do Estado Brasileiro"</strong> .</p>
				<p>As submissões de trabalhos ocorrerão entre 24 de abril e 26 de junho de 2017.</p>
				<p>Nas próximas semanas vamos trazer mais informações, incluindo palestrantes, hospedagem, transporte, gastronomia, turismo...</p>
				<p>E curta nossa página no facebook, com mais novidades: <a href="https://www.facebook.com/encontrofineduca">https://www.facebook.com/encontrofineduca</a></p>
				<p>Esperamos você em Natal pra debater conosco!!!</p>
			</div>
		</div>
	</div>
	</section>
	
	<!--<section id="palestrantes">
	<div id="content" class="site-content container clearfix">
		<div class="palestrantes">
			<div class="type-page">
				<h1 class="page-title text-center">PALESTRANTES</h1><br>
				<div class="row">
					<div class="column column-2">
						<a href="#" class="eModal-1"><img src="<?php //echo get_bloginfo('template_url') ?>/images/palestrante_2.jpeg"></a>
						<p class="text-center"><strong>Amir Khair</strong><br>21/07 - 09h00</p>
					</div>
					<div class="column column-2">
						<a href="#" class="eModal-1"><img src="<?php //echo get_bloginfo('template_url') ?>/images/palestrante_2.jpeg"></a>
						<p class="text-center"><strong>Amir Khair</strong><br>21/07 - 09h00</p>
					</div>
					<div class="column column-2">
						<a href="#" class="eModal-1"><img src="<?php //echo get_bloginfo('template_url') ?>/images/palestrante_2.jpeg"></a>
						<p class="text-center"><strong>Amir Khair</strong><br>21/07 - 09h00</p>
					</div>
					<div class="column column-2">
						<a href="#" class="eModal-1"><img src="<?php //echo get_bloginfo('template_url') ?>/images/palestrante_2.jpeg"></a>
						<p class="text-center"><strong>Amir Khair</strong><br>21/07 - 09h00</p>
					</div>
					<div class="column column-2">
						<a href="#" class="eModal-1"><img src="<?php //echo get_bloginfo('template_url') ?>/images/palestrante_2.jpeg"></a>
						<p class="text-center"><strong>Amir Khair</strong><br>21/07 - 09h00</p>
					</div>
					<div class="column column-2">
						<a href="#" class="eModal-1"><img src="<?php //echo get_bloginfo('template_url') ?>/images/palestrante_2.jpeg"></a>
						<p class="text-center"><strong>Amir Khair</strong><br>21/07 - 09h00</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>-->

	<section id="programacao">
	<div id="content" class="site-content container clearfix">
		<div class="type-page">
			<h1 class="page-title text-center">PROGRAMAÇÃO</h1><br>
			<p class="text-center"><strong>24 de Agosto (Quinta-Feira)</strong></p>
			<table class="text-center">
                <thead>
                    <tr>
                        <th>Horário</th>
                        <th>Atividade</th>
                        <th>Participantes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>08h00 - 09h00</strong></td>
                        <td><strong>Inscrições</strong></td>
                        <td>
                        	
						</td>
					</tr>
					<tr>
						<td><strong>09h00 - 09h30</strong></td>
                        <td><strong>Abertura</strong> - Boas vindas aos participantes</td>
                        <td>
                        	
						</td>
					</tr>
					<tr>
						<td><strong>09h30 - 12h30</strong></td>
                        <td><strong>Conferência de abertura</strong> - O fim do breve ciclo da cidadania social no Brasil: ações imediatas e desafios futuros</td>
                        <td>
                        	<!--<div class="row">
	                        	<div class="column column-4">
									<a href="#" class="eModal-1"><img src="<?php //echo get_bloginfo('template_url') ?>/images/palestrante_1.jpeg"></a>
								</div>
							</div>-->
							Prof. Dr. Eduardo Fagnani (Unicamp)<br />
							Profa. Dra. Denise Gentil (UFRJ)<br />
							Coordenador: Prof. Dr. Luiz Araújo (UNB)
						</td>
					</tr>
					<tr>
						<td><strong>12h30 - 14h30</strong></td>
                        <td><strong>Almoço</strong></td>
                        <td>
                        	
						</td>
                    </tr>
                    <tr>
						<td><strong>14h30 - 17h00</strong></td>
                        <td><strong>Oficina 1</strong> - Vencimentos, remunerações e salários de docentes de escolas públicas</td>
                        <td>
                        	Prof. Dr. Rubens Barbosa de Camargo (USP)
						</td>
                    </tr>
                    <tr>
                    <td><strong>14h30 - 17h00</strong></td>
						<td><strong>Oficina 2</strong> - Discutindo os conceitos do CAQi (Custo Aluno Qualidade inicial) e do CAQ</td>
                        <td>
                        	Prof. Dr. José Marcelino Rezende Pinto (USP)<br>
                        	Profa. Aline Kazuko Sonobe (UFPR)
						</td>
                    </tr>
                    <tr>
                    <td><strong>14h30 - 17h00</strong></td>
						<td><strong>Oficina 3</strong> - Pesquisa em financiamento e métodos quantitativos: primeiras aplicações</td>
                        <td>
                        	Prof. Dr. Thiago Alves (UFPR)
						</td>
                    </tr>
                    <tr>
                    <td><strong>14h30 - 17h00</strong></td>
						<td><strong>Oficina 4</strong> - Receitas para o financiamento da educação brasileira</td>
                        <td>
                        	Prof. Dr. Marcos Bassi (UFSC)<br>
                        	Prof. Dr. I Juca-Pirama (UFRGS)
						</td>
                    </tr>
                    <tr>
						<td><strong>17h00 - 17h30</strong></td>
                        <td><strong>Café</strong></td>
                        <td> </td>
                    </tr>
                    <tr>
						<td><strong>17h30 - 20h00</strong></td>
                        <td><strong>Mesa Redonda</strong> - O ajuste fiscal no Brasil e as consequências para as políticas sociais</td>
                        <td>
                        	Dra. Élida Graziane Pinto – Ministério Público de Contas do Estado de São Paulo<br />
							Dr. Clemente Ganz Lúcio – Departamento Intersindical de Estatística e Estudos Socioeconômicos (DIEESE)<br /> 
							Prof. Daniel Cara – Campanha Nacional pelo Direito à Educação<br />
							Coordenação: Profa. Dra. Lisete Arelaro (USP)
						</td>
                    </tr>
                </tbody>
            </table>
			<br><p class="text-center"><strong>25 de Agosto (Sexta-Feira)</strong></p>
			<table class="text-center">
                <thead>
                    <tr>
                        <th>Horário</th>
                        <th>Atividade</th>
                        <th>Participantes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>08h00 - 10h00</strong></td>
                        <td><strong>Apresentação de Comunicações nos Grupos de Trabalhos </strong><br/></td>
                        <td>
                        	
						</td>
                    </tr>
                    <tr>
                        <td><strong>10h30 - 12h30</strong></td>
                        <td><strong>Apresentação de Comunicações nos Grupos de Trabalhos </strong><br/>
							1. Políticas de Financiamento da Educação Básica e Superior <br/>
							2. Planos, Carreira e Remuneração de Professores <br/>
							3. Relações Público-Privado no Financiamento da Educação </td>
                        <td>
                        	
						</td>
                    </tr>
                    </tr>
                    <tr>
                        <td><strong>12h30 - 14h30</strong></td>
                        <td><strong>Almoço</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>14h30 - 17h30</strong></td>
                        <td><strong>Mesa Redonda</strong> - Processos de privatização na educação na atualidade: tendência na América Latina </td>
                        <td>
                        	Profa. Dra. Theresa Adrião – Brasil<br />
							Prof. Dr. Diego Parra Moreno - Chile<br />
							Prof. Dr. Ricardo Cuenca - Peru<br />
							Coordenação: Profa. Dra. Nalu Farenzena (UFRGS)

						</td>
                    </tr>
                    <tr>
                        <td><strong>17h30 - 18h00</strong></td>
                        <td><strong>Café</strong></td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td><strong>18h00 - 20h00</strong></td>
                        <td>
                        	<strong>Assembléia</strong><br>
							Discussão e aprovação da Carta de Natal<br>
							Eleição da nova Diretoria- biênio 2017/2019
						</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td><strong>20h00</strong></td>
                        <td>
                        	<strong>Jantar de Confraternização</strong>
						</td>
                        <td> </td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>
	</section>

	<section id="local">
	<div class="localizacao">
		<div id="content" class="site-content container clearfix text-center">
			<h1 class="page-title">LOCAL DO EVENTO</h1>
			<p><strong>Centro de Educação da Universidade Federal do Rio Grande do Norte (UFRN)</strong><br>Campus Universitário UFRN, Lagoa Nova<br>Natal-RN, CEP 59.072-970</p>
			<div id="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.1198014724578!2d-35.19888548568872!3d-5.83873329576942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b2ff9fcdaa5513%3A0x345d0d58925d5142!2sCentro+de+Educa%C3%A7%C3%A3o+-+CE+%2F+UFRN!5e0!3m2!1spt-BR!2sbr!4v1491139245023" width="800" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
	</section>

	<section id="datas">
		<div id="content" class="site-content container clearfix">
			<div class="type-page">
			<h1 class="page-title">DATAS IMPORTANTES</h1>
			<p>
				•&emsp;<strong>03/04/2017</strong> – Início da quitação da anuidade FINEDUCA <br>
				•&emsp;<strong>22/04/2017</strong> – Início da Inscrição no V Encontro com e sem apresentação de Trabalho <br>
				•&emsp;<strong>24/04 a 02/07/2017</strong> – Submissão de trabalhos para o V Encontro da FINEDUCA <br>
				•&emsp;<strong>23/06/2017</strong> – Limite para quitação da anuidade 2017 e para pagamento da Inscrição no V Encontro para aqueles que forem submeter trabalhos. <br>
				•&emsp;<strong>16/07/2017</strong> – Divulgação final da relação dos trabalhos aprovados  <br>
				•&emsp;<strong>24 e 25/08/2017</strong> – Realização do V Encontro Fineduca <br>
			</p>
		</div>
	</div>
	</section>

	<section id="eixos">
	<div id="content" class="site-content container clearfix">
		<div class="type-page">
			<h1 class="page-title">EIXOS TEMÁTICOS</h1>
			<p>
				<strong>1</strong>&ensp;-&ensp;Políticas de financiamento da educação básica e superior<br>
				<strong>2</strong>&ensp;-&ensp;Planos, Carreira e Remuneração de professores<br>
				<strong>3</strong>&ensp;-&ensp;Relações público-privado no financiamento da educação
			</p>
		</div>
	</div>
	</section>

	<section id="inscricao">

		<div id="content" class="site-content container clearfix">
			<div class="type-page">
				<h1 class="page-title text-center">INSCRIÇÃO</h1><br/>
			<!--<h1 class="page-title text-center">INSCRIÇÃO</h1>
			<div id="content" class="site-content container clearfix">
		
			<div class="type-page">-->
				<table class="text-center">
	                <thead>
	                	<tr>
	                		<td rowspan="2"><strong>Tipos</strong></td>
	                        <td colspan="2">
	                        	<strong>ATÉ 24/07/2017 (COM DESCONTO)</strong>
	                        </td>
	                        <td colspan="2">
	                        	<strong>APÓS 24/07/2017</strong>
	                        </td>
						</tr>
						<tr>
	                        <td>
	                        	<strong>Associado/a com anuidade 2017 paga</strong>
	                        </td>
	                        <td>
	                        	<strong>Associado/a não quite em 2017 e NÃO Associado</strong>
	                        </td>
	                        <td>
	                        	<strong>Associado/a com anuidade 2017 paga</strong>
	                        </td>
	                        <td>
	                        	<strong>Associado/a não quite em 2017 e NÃO Associado</strong>
	                        </td>
						</tr>
					</thead>
					<tbody>
						<tr>
	                		<td>Professores universitários e Pesquisadores</td>
	                        <td>R$ 50,00</td>
	                        <td>R$ 150,00</td>
	                        <td>R$ 75,00</td>
	                        <td>R$ 200,00</td>
						</tr>
						<tr>
	                		<td>Professores da educação básica</td>
	                        <td>R$ 25,00</td>
	                        <td>R$ 75,00</td>
	                        <td>R$ 35,00</td>
	                        <td>R$ 100,00</td>
						</tr>
						<tr>
	                		<td>Estudantes de Pós-Graduação</td>
	                        <td>R$ 25,00</td>
	                        <td>R$ 75,00</td>
	                        <td>R$ 35,00</td>
	                        <td>R$ 100,00</td>
						</tr>
						<tr>
	                		<td>Estudantes de Graduação</td>
	                        <td>R$ 10,00</td>
	                        <td>R$ 30,00</td>
	                        <td>R$ 15,00</td>
	                        <td>R$ 40,00</td>
						</tr>
						<tr>
	                		<td>Participantes de movimentos sociais</td>
	                        <td>R$ 10,00</td>
	                        <td>R$ 30,00</td>
	                        <td>R$ 15,00</td>
	                        <td>R$ 40,00</td>
						</tr>
						<tr>
	                		<td>Outros Profissionais</td>
	                        <td>R$ 50,00</td>
	                        <td>R$ 150,00</td>
	                        <td>R$ 75,00</td>
	                        <td>R$ 200,00</td>
						</tr>
	               	</tbody>
	            </table>
	            <div class="text-center"><a href="evento-fineduca/inscreva-se" class="submeter">Inscreva-se</a></div>
	</div>
		</div>
	</section>

	<section id="submissao">
	<div id="content" class="site-content container clearfix">
		<div class="type-page">
			<h1 class="page-title text-center">SUBMISSÃO DE TRABALHOS</h1>
			<p style="color: red;"><strong>SUBMISSÕES ENCERRADAS.</strong></p>
			<p class="text-center"><strong>Normas para submissão de artigos</strong></p>
			<p>
				Serão aceitas para a avaliação pelo Comitê Científico as propostas de Comunicações Orais que seguirem as seguintes condições gerais: <br><br>
				- Cada autor(a) poderá inscrever até 2 (dois) trabalhos, sendo:<br><br> 

				•&emsp;1 (um) como autor(a) principal; <br>
				•&emsp;1 (um) em coautoria. <br><br>

				Cada trabalho deverá ter no máximo um(a) autor(a) e dois coautores.<br><br>

				O(s) autor(es) do(s) trabalho(s) submetido(s) deverão indicar, no momento do envio do arquivo, a que eixo temático o trabalho está vinculado:<br><br>

				1 - Políticas de financiamento para a educação básica e superior <br>
				2 - Planos, Carreira e Remuneração de professores <br>
				3 - Relações público-privado no financiamento da educação<br><br><br>


				As propostas devem ser encaminhadas mediante resumo expandido, de 7.000 a 15.000 caracteres (com espaço), em português, inglês ou espanhol, incluindo referências bibliográficas, ilustrações, gráficos, mapas e tabelas, se for o caso.<br><br>

				Texto em Word for Windows obedecendo às seguintes recomendações: fonte Times New Roman, tamanho 12, espaço 1,5, papel A4, margens de 2,5 cm, paginação no canto inferior direito.<br><br>
				Identificação no alto da página incluindo:<br><br>
				&emsp;•&ensp;Título do trabalho;<br>
				&emsp;•&ensp;Nome(s) do(s) autor(es); titulação máxima (instituição, opcional); instituição à qual se vincula; e-mail (opcional) em nota de rodapé.<br>
				&emsp;•&ensp;Em caso de financiamento da pesquisa, a instituição financiadora deverá ser mencionada em nota de rodapé.<br><br>
				O resumo expandido deverá contemplar a apresentação da temática, os objetivos, a justificativa, a metodologia, os resultados e discussão, as conclusões e as referências (de acordo com as normas da ABNT).<br><br> 
				As notas de rodapé deverão ser utilizadas para esclarecimentos absolutamente necessários.<br><br>
				Os autores mencionados no artigo deverão ser citados entre parênteses no corpo do texto, com o ano da publicação da obra e, quando for o caso, com a(s) página(s) citada(s). Ex.:  (CALKINS, 1950, p.161).<br><br>
				Os textos recebidos serão encaminhados a pareceristas do Comitê Científico.<br><br> 
				A submissão de trabalho ao V Encontro Fineduca autoriza a entidade a publicar o resumo expandido nos Anais do evento.<br><br>
				Os autores dos trabalhos aprovados no V Encontro Fineduca poderão submeter seus artigos completos à FINEDUCA - Revista de  Financiamento da Educação eletrônica (http://seer.ufrgs.br/fineduca) para avaliação.<br><br>
				Para submeter os trabalhos, autores e coautores devem, primeiramente, fazer suas inscrições no V Encontro. Antes da submissão, o sistema faz uma verificação.<br><br>
				Atenção para os prazos de confirmação dos pagamentos das inscrições pelo PagSeguro! Na opção cartão de crédito, a confirmação pode levar de alguns minutos até dois dias úteis. Na opção boleto bancário, o prazo pode ser de um até três dias úteis.
			</p>
			<!--<div class="text-center"><a href="submissao" class="submeter">Submeta seu trabalho</a></div>-->
		</div>
	</div>
	</section>	
	
	<!--<section id="palestrantes">
	<div id="content" class="site-content container clearfix">
		<div class="row">
			<div class="column column-6">
				<div class="type-page">
					<h1 class="page-title text-center">DATAS IMPORTANTES</h1><br>
					•&emsp;<strong>03/04/2017</strong> – Início da quitação da anuidade FINEDUCA <br>
					•&emsp;<strong>22/04/2017</strong> – Início da Inscrição no V Encontro com e sem apresentação de Trabalho <br>
					•&emsp;<strong>24/04 a 23/06/2017</strong> – Submissão de trabalhos para o V Encontro da FINEDUCA (Acesse aqui as regras de submissão de trabalhos) <br>
					•&emsp;<strong>23/06/2017</strong> – Limite para quitação da anuidade 2017 e para pagamento da Inscrição no V Encontro para aqueles que forem submeter trabalhos. <br>
					•&emsp;<strong>16/07/2017</strong> – Divulgação final da relação dos trabalhos aprovados  <br>
					•&emsp;<strong>24 e 25/08/2017</strong> – Realização do V Encontro Fineduca <br>
				</div>
			</div>
			<div class="column column-6">
				<div class="type-page">
					<h1 class="page-title text-center">EIXOS TEMÁTICOS</h1>
					<strong>1</strong>&ensp;-&ensp;Políticas de financiamento a educação básica e superior<br>
					<strong>2</strong>&ensp;-&ensp;Remuneração de professores<br>
					<strong>3</strong>&ensp;-&ensp;Relações público-privado na educação
				</div>
				<div class="type-page">
					<h1 class="page-title text-center">INFORMAÇÕES ÚTEIS</h1>
					•&emsp; Dicas de hospedagem<br>
					•&emsp; Alternativas de transporte para chegar ao local de evento<br>
					•&emsp; Sugestões de bares e restaurantes<br>
					•&emsp; Dicas de turismo
				</div>
			</div>
		</div>
	</div>
	</section>-->

	<section id="organizacao">
	<div id="content" class="site-content container clearfix">
		<div class="type-page">
			<h1 class="page-title text-center">ORGANIZAÇÃO</h1>
			<h2 class="page-title">COMISSÃO ORGANIZADORA</h2>
			<div class="row">
				<div class="column column-4">
					<p>
						Ângelo Ricardo de Souza<br>
						José Marcelino de Rezende Pinto<br>
						Juca Gil<br>
						Lisete Regina Gomes Arelaro<br>  
						Luis Carlos Sales<br>
						Luiz Silva Araújo  
					</p>
				</div>
				<div class="column column-4"> 
					<p>           
						Márcia Jacomini<br>
						Maria Dilnéia Espíndola Fernandes<br> 
						Nalú Farenzena    <br>              
						Paulo de Sena Martins<br>
						Rosana Evangelista da Cruz  <br>           
						Rosana Maria Gemaque Rolim
					</p>
				</div>
				<div class="column column-4"> 
					<p>     
						Rubens Barbosa de Camargo   <br>               
						Teise de Oliveira Guaranha Garcia<br>
						Theresa Adrião<br>
						Thiago Alves    <br>                
						Vera Lúcia Ferreira Alves de Brito
					</p>
				</div>
			</div>
			<h2 class="page-title">COMITÊ LOCAL</h2>
			<p>Magna França (UFRN)<br>Márcia Gurgel (UFRN)<br></p>
			<h2 class="page-title">COMITÊ CIENTÍFICO</h2>
			<div class="row">
				<div class="column column-4">
					<p>
						Adriana Dragone Silveira<br>
						Andrea Barbosa Gouveia<br>
						Ângelo Ricardo de Souza<br>
						Bianca Correa<br>
						Calinca Jordânia Pergher<br>
						Cassia Domiciano<br> 
						Cristina Helena Almeida de Carvalho<br>
						Dalva Valente Guimarães Gutierres<br>
						Daniela Pires<br>
						Edmilson Jovino de Oliveira<br>
						Fernanda Ferreira Belo<br>
						Francisco Silva<br>
						Jaqueline Marcela Villafuerte Bittencourt<br>
						José Marcelino Rezende Pinto<br>
						Juca Gil
					</p>
				</div>
				<div class="column column-4">
					<p>
						Lisete Regina Gomes Arelaro<br>
						Luís Carlos Sales<br>
						Luiz Araújo<br>
						Luiz de Sousa Junior<br>
						Magna França<br>
						Márcia Aparecida Jacomini<br>
						Marcos Edgar Bassi<br>
						Marcus Vinicius David<br>
						Margarita Victoria Rodriguez<br>
						Maria da Graça Nóbrega Bollmann<br>
						Maria Dilnéia Espíndola Fernandes<br>
						Maria Goreti Machado<br>
						Maria Luiza Rodrigues Flores<br>
						Maria Raquel Caetano<br>
						Nalú Farenzena
					</p>
				</div>
				<div class="column column-4">
					<p>
						Nelson Cardoso do Amaral<br>
						Patrícia Marchand<br>
						Rosa Maria Pinheiro Mosna<br>
						Rosana Evangelista da Cruz<br>
						Rosana Maria Gemaque Rolim<br>
						Rosimar Serena Siqueira Esquinsani<br>
						Rubens Barbosa de Camargo<br>
						Solange Jarcem Fernandes<br>
						Tais Moura Tavares<br>
						Teise de Oliveira Guaranha Garcia<br>
						Theresa Adrião<br>
						Thiago Alves<br>
						Vera Lúcia Ferreira Alves de Brito<br>
						Vera Lucia Jacob Chaves<br>
						Vera Maria Vidal Peroni<br>
						Wellington Ferreira de Jesus
					</p>
				</div>
			</div>
		</div>
	</div>
	</section>

	<section id="aprovados">
		<div id="content" class="site-content container clearfix">
		<div class="type-page">
			<h1 class="page-title">TRABALHOS APROVADOS</h1>
			<p>
				Os resultados das avaliações dos trabalhos enviados até 10/06/2017 estão disponíveis. Para consultar: (1) acesse <a href="www.fineduca.org.br">www.fineduca.org.br</a>, em seguida (2) clique no menu '<strong>Meu Espaço</strong>';  depois (3) insira o '<strong>login e senha</strong>' e, por fim, (4) consulte a avaliação do trabalho na aba '<strong>Submissões</strong>'.
			</p>
		</div>
	</div>
	</section>

	<section id="contato">
	<div id="content" class="site-content container clearfix">
		<div class="type-page">
			<h1 class="page-title">CONTATO</h1>
			<p>
				Em caso de dúvidas, envie email para <strong>encontro@fineduca.org.br</strong>.
			</p>
		</div>
	</div>
	</section>

	<section id="informacoes">
	<div id="content" class="site-content container clearfix">
		<div class="type-page">
			<h1 class="page-title text-center">INFORMAÇÕES ÚTEIS</h1>
			<!--<p>
				Em breve: dicas de hospedagem, alternativas de transporte para chegar ao local de evento, sugestões de restaurantes, bares e turismo.
			</p>-->
			<h2 class="page-title">DICAS DE HOSDAGEM</h2>
			<p>
				<strong>Op&ccedil;&atilde;o 1 - </strong> Hotel Monza Palace (em frente a Universidade-&nbsp;Av.Sen.Salgado F&ordm;, 3490 - &nbsp;0,2 km &nbsp;at&eacute; a Universidade)<br /> 
				R$ 145,00 por dia, por apartamento single<br />
				R$ 182,00 por dia, por apartamento duplo<br /> 
				R$ 218,00 por dia, por apartamento triplo<br /> 
				R$ 264,00 por dia, por apartamento quadruplo<br /> 
				<strong>Inclu&iacute;do</strong>: Caf&eacute; da manh&atilde;.<br/>
				Site: <a href="http://monzapalace.com.br/">http://monzapalace.com.br/</a>
			</p>

			<p>
				<strong>Op&ccedil;&atilde;o 2 - </strong>Villa Park Hotel -&nbsp;(&nbsp;Av.Sen.Salgado F&ordm;, 1525 -&nbsp;4,2 km &nbsp;at&eacute; a Universidade)<br /> 
				R$ 183,00 por dia, por apartamento single<br />
				R$ 200,00 por dia, por apartamento duplo<br /> 
				R$ 220,00 por dia, por apartamento triplo<br /> 
				<strong>Inclu&iacute;do</strong>: Caf&eacute; da manh&atilde;.<br/>
				Site: <a href="http://www.villaparkhotel.com.br/">http://www.villaparkhotel.com.br/</a>
			</p>
			
			<p>
				<strong>Op&ccedil;&atilde;o 3 - </strong>Mirador Praia Hotel (R. Francisco Gurgel, N&ordm; 9152, Ponta Negra) &ndash; Pr&oacute;ximo a praia<br />
				R$ 179,10 por dia, por apartamento duplo<br />
				R$ 229,00 por dia, por apartamento duplo luxo<br />
				R$ 249,00 por dia, por apartamento duplo superior luxo<br />
				R$ 249,00 por dia, por apartamento triplo<br />
				R$ 279,00 por dia, por apartamento triplo luxo<br />
				R$ 299,00 por dia, por apartamento triplo superior luxo<br />
				Site: <a href="http://www.miradorpraiahotel.com.br/">http://www.miradorpraiahotel.com.br/</a>
			</p>

			<p>
				<strong>Op&ccedil;&atilde;o 4 - </strong>Praia Azul Mar Hotel (R. Francisco Gurgel, N&ordm; 94, Ponta Negra) &ndash; Pr&oacute;ximo a praia<br />
				R$ 187,25 por dia, por apartamento standard duplo<br />
				R$ 245,00 por dia, por apartamento standard triplo<br />
				R$ 297,50 por dia, por apartamento standard para quatro pessoas<br />
				R$ 210,79 por dia, por apartamento Master duplo<br />
				Site: <a href="http://www.praia-azul.com/">http://www.praia-azul.com/</a>
			</p>

			<p>
				<strong>Op&ccedil;&atilde;o 5 - </strong>Pousada La Luna (R. Francisco Gurgel, N&ordm; 9045, Ponta Negra) &ndash; Pr&oacute;ximo a praia<br />
				Site: <a href="http://www.pousadalaluna.com.br/">http://www.pousadalaluna.com.br/</a>
				Contato: (84) 3642-1349<br />
				<strong>VALOR:</strong> Apartamento para duas pessoas - 160,00 (di&aacute;rias com caf&eacute; da manh&atilde;)<br />
				Email: <a href="mailto:reservas@pousadalaluna.com.br">reservas@pousadalaluna.com.br</a>
			</p>

			<p>
				<strong>Op&ccedil;&atilde;o 6 - </strong>Pousada Mar &amp; Brisa (R. &Eacute;lia Barros, N&ordm; 9112, Ponta Negra) &ndash; Pr&oacute;ximo a praia. <br />
				Site: <a href="http://pousadamarebrisa.com.br">http://pousadamarebrisa.com.br</a><br />
				Contato: (84) 3642-1171 / (84) 3011-9112 / (84) 99921-0776<br />
				<strong>VALORES:</strong><br />
				Apartamento individual &ndash; 85,00 sem caf&eacute; da manh&atilde;<br />
				Apartamento duplo &ndash; 90,00 sem caf&eacute; da manh&atilde;<br />
				<strong>Obs: Hotel ao lado tem conv&ecirc;nio com a pousada cobrando 15 reais o caf&eacute; individual.</strong><br />
				Email: <a href="http://pousadamarebrisa.com.br/acomodacoes/">reservas@pousadamarebrisa.com.br</a><br /> 
				Site: <a href="http://pousadamarebrisa.com.br/acomodacoes/">marebrisanatal@gmail.com</a>
			</p>

			<p>
				<strong>Op&ccedil;&atilde;o 7 - </strong>PraiaMar Hotel (Conv&ecirc;nio com a UFRN) se enviar a rela&ccedil;&atilde;o dos participantes com anteced&ecirc;ncia e informa&ccedil;&otilde;es sobre o evento, o hotel far&aacute; o valor da di&aacute;ria o mesmo do conv&ecirc;nio. (Fica pr&oacute;ximo a praia).<br />
				<strong>VALORES COM CONV&Ecirc;NIO</strong><br />
				Apartamento Simples: 230,00<br />
				Apartamento Duplo: 230,00<br />
				Apartamento Triplo: 277,00<br />
				Site: <a href="http://www.praiamarnatal.com.br/">http://www.praiamarnatal.com.br/</a>
			</p>

			<p>
				<strong>Op&ccedil;&atilde;o 8 - </strong>Hotel Holliday In, do grupo PraiaMar Hotel. (Av.Sen.Salgado F&ordm;, 3490 -&nbsp;1,4 km &nbsp;at&eacute; a Universidade) &ndash; tamb&eacute;m pode ser pelo conv&ecirc;nio. Perto da Universidade, n&atilde;o fica pr&oacute;ximo a praia. <br />
				<strong>VALORES COM CONV&Ecirc;NIO</strong><br />
				Di&aacute;rias: Individual (simples) &ndash; 207,00<br />
				Duplo: 244,00<br />
				Triplo: 232,00<br />
				<strong>VALORES SEM CONV&Ecirc;NIO</strong><br />
				R$ <strong>273,00</strong> por dia, por apartamento duplo(somente apto duplo, com duas camas de casal)<br />
				Site: <a href="http://www.holidaynatal.com.br/">http://www.holidaynatal.com.br/</a>
			</p>
		</div>
	</div>
	</section>

<img src="<?php echo get_bloginfo('template_url') ?>/images/rodape.jpg">
<?php //get_footer(); ?>

<script>
	(function($) {
		var $doc = $('html, body');
		$('.ancora').click(function() {
			console.log($(this));
		    $doc.animate({
		        scrollTop: $( $(this).attr('href') ).offset().top-100
		    }, 500);
		    return false;
		});
	})( jQuery );
</script>
