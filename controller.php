<?php  
        $sql_query= "SELECT * FROM $table_name WHERE task_id!=''";

        $fStatus=$db->get('status');//search data by status
        if($fStatus){
            $sql_query.="AND status='$fStatus'";
            $link.="status=$fStatus&";
        }
        $f_priority=$db->get('priority');
        if($f_priority){
            $sql_query.="AND priority='$f_priority'";
            $link.="priority=$f_priority&";
        }
        $daterange=$db->get('daterange'); //search data by daterange
        if($daterange){
            $daterangeArray=explode('-', $daterange);
            $initialDate = date('Y-m-d', strtotime(trim($daterangeArray[0])));
            $terminalDate = date('Y-m-d', strtotime(trim($daterangeArray[1])));
            $sql_query.="AND date(`date_added`) between '$initialDate' AND '$terminalDate'";
            $link.="daterange=$daterange&";
        }

        //now execute sql_query and see the result

?>