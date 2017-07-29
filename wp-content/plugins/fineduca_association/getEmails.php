<?php
    add_action('wp_ajax_get_emails','funcao_get_emails');
    function funcao_get_emails(){
        
        global $wpdb;
        // Podemos acessar $_REQUEST para usar os dados enviados:​
        $situacao = $_POST['situacao'];
        $status = "";
        if(strcmp($situacao, 'quites')==0){
            $status = " AND (p.post_status like 'wc-completed' OR p.post_status like 'wc-processing') ";
        }else if(strcmp($situacao, 'naoquites')==0){
            $status = " AND p.post_status not like 'wc-completed' AND p.post_status not like 'wc-processing' ";
        }

        $sql = "SELECT 
                    u.ID as user_id, 
                    u.user_email, 
                    u.user_registered, 
                    group_concat(um.meta_value SEPARATOR ' ') as user_data
                FROM 
                    {$wpdb->prefix}users u
                    JOIN {$wpdb->prefix}usermeta um ON u.ID=um.user_id
                WHERE 
                    (um.meta_key LIKE 'first_name' OR um.meta_key LIKE 'last_name') AND  
                    u.user_nicename NOT LIKE 'admin'
                GROUP BY u.ID";
        $users = $wpdb->get_results($sql , OBJECT );

        $emails = "";
        foreach ($users as $user) {
            if($status){
                $sql = "SELECT 
                            p.post_status as order_status
                        FROM 
                            $wpdb->postmeta pm 
                            JOIN $wpdb->posts p ON pm.post_id=p.ID
                            JOIN {$wpdb->prefix}woocommerce_order_items o ON p.ID=o.order_id 
                        WHERE 
                            pm.meta_key like '_customer_user' AND 
                            o.order_item_name like 'Anuidade 2017%' ".$status." AND
                            pm.meta_value like '".$user->user_id."'";
                $retorno = $wpdb->get_results($sql , OBJECT );

                if(!empty($retorno)){
                    $emails .= $user->user_data." < ".$user->user_email." >; ";
                }
            }else{
                $emails .= $user->user_data." < ".$user->user_email." >; ";
            }
        }
        $retorno['emails'] = $emails;

        echo json_encode($retorno);

        wp_die();
    }