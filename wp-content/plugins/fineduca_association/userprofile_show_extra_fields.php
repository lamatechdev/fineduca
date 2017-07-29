<?php

add_action('edit_user_profile', 'userprofile_show_extra_fields');

function userprofile_show_extra_fields( $user ) {
   ?>
<script type="text/javascript" src="<?php echo plugins_url( 'fineduca_association/js/jquery.1.8.3.min.js', dirname(__FILE__) ); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url( 'fineduca_association/js/jquery.maskedinput.min.js', dirname(__FILE__) ); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url( 'fineduca_association/js/script_update.js', dirname(__FILE__) ); ?>"></script>
<script type="text/javascript" src="<?php echo plugins_url( 'fineduca_association/js/script_hide_userprofile_fields.js', dirname(__FILE__) ); ?>"></script>

    <h2>Informações Adicionais</h2>
    <table class="form-table">
        <tr>
            <th><label for="cpf">CPF</label></th>
            <td>
                <input type="text" name="cpf" id="cpf" value="<?php echo esc_attr( get_the_author_meta( 'cpf', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="birthdate">Data de nascimento</label></th>
            <td>
                <input type="text" name="birthdate" id="birthdate" value="<?php echo esc_attr( get_the_author_meta( 'birthdate', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="sex">Sexo</label></th>
            <td>
            <input type="hidden" id="sex" value="<?php echo esc_attr(get_the_author_meta('sex', $user->ID )); ?>" />
                <input type="radio" name="sex" value="Feminino">&nbsp;Feminino&nbsp;&nbsp;<input type="radio" name="sex" value="Masculino">&nbsp;Masculino
            </td>
        </tr>
    </table>

    <h2>Contatos Telefônicos</h2>
    <table class="form-table">
        <tr>
            <th><label for="phone">Telefone Residencial</label></th>
            <td>
                <input type="text" name="phone" id="phone" value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="phone_company">Telefone Comercial</label></th>
            <td>
                <input type="text" name="phone_company" id="phone_company" value="<?php echo esc_attr( get_the_author_meta( 'phone_company', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="cellphone">Celular</label></th>
            <td>
                <input type="text" name="cellphone" id="cellphone" value="<?php echo esc_attr( get_the_author_meta( 'cellphone', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
    </table>

    <h2>Ocupação Profissional</h2>
    <table class="form-table">
        <tr>
            <th><label for="ocupacao">Ocupação Profissional</label></th>
            <td>
                <input type="hidden" id="ocupacao" value="<?php echo esc_attr(get_the_author_meta('ocupacao', $user->ID )); ?>" />
                <input type="radio" name="ocupacao" value="Professores universitários e Pesquisadores">&nbsp;Professores universitários e Pesquisadores<br />
                <input type="radio" name="ocupacao" value="Professores da educação básica">&nbsp;Professores da educação básica<br />
                <input type="radio" name="ocupacao" value="Estudantes de Pós-Graduação">&nbsp;Estudantes de Pós-Graduação<br />
                <input type="radio" name="ocupacao" value="Estudantes de Graduação">&nbsp;Estudantes de Graduação<br />
                <input type="radio" name="ocupacao" value="Participantes de movimentos sociais">&nbsp;Participantes de movimentos sociais<br />
                <input type="radio" name="ocupacao" value="Outros profissionais">&nbsp;Outros profissionais
            </td>
        </tr>
        <tr>
            <th><label for="company">Instituição em que trabalha ou estuda</label></th>
            <td>
                <input type="text" name="company" id="company" value="<?php echo esc_attr( get_the_author_meta( 'company', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
    </table>

    <h2>Formação - Maior Titulação</h2>
    <table class="form-table">
        <tr>
            <th><label for="titulacao">Titulação</label></th>
            <td>
            <input type="hidden" id="titulacao" value="<?php echo esc_attr(get_the_author_meta('titulacao', $user->ID )); ?>" />
                <input type="radio" name="titulacao" value="Ensino Médio">&nbsp;Ensino Médio&nbsp;&nbsp;
                <input type="radio" name="titulacao" value="Graduação">&nbsp;Graduação&nbsp;&nbsp;
                <input type="radio" name="titulacao" value="Especialização">&nbsp;Especialização&nbsp;&nbsp;
                <input type="radio" name="titulacao" value="Mestrado">&nbsp;Mestrado&nbsp;&nbsp;
                <input type="radio" name="titulacao" value="Doutorado">&nbsp;Doutorado
            </td>  
        </tr>
        <tr>
            <th><label for="area_formacao">Área de estudo ou Especialização</label></th>
            <td>
                <input type="text" name="area_formacao" id="area_formacao" value="<?php echo esc_attr( get_the_author_meta( 'area_formacao', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="instituicao_formacao">Instituição em que se formou</label></th>
            <td>
                <input type="text" name="instituicao_formacao" id="instituicao_formacao" value="<?php echo esc_attr( get_the_author_meta( 'instituicao_formacao', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="ano_formacao">Ano de conclusão</label></th>
            <td>
                <input type="text" name="ano_formacao" id="ano_formacao" value="<?php echo esc_attr( get_the_author_meta( 'ano_formacao', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
    </table>
<?php 
    }
?>