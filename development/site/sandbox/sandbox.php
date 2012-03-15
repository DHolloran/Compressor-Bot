function decompressJS($in){
    $in = str_replace("\n", '', $in);
    $in = str_replace("\t", '', $in);
    $tabcount = 0;
    $result = '';
    $inquote = false;
    $ignorenext = false;
    $tab = "\t";
    $newline = "\n";

    for($i = 0; $i < strlen($in); $i++) {
        $char = $in[$i];

        if ($ignorenext) {
            $result .= $char;
            $ignorenext = false;
        } else {
            switch($char) {
                case '{':
                    $tabcount++;
                    $result .= $char . $newline . str_repeat($tab, $tabcount);
                    break;
                case '}':
                    $tabcount--;
                    $result = trim($result) . $newline . str_repeat($tab, $tabcount) . $char;
                    break;

                case ';':
                    $result .= $char . $newline . str_repeat($tab, $tabcount);
                    break;
                case '"':
                    $inquote = !$inquote;
                    $result .= $char;
                    break;
                case '\\':
                    if ($inquote) $ignorenext = true;
                    $result .= $char;
                    break;
                default:
                    $result .= $char;
            }
        }
    }
    // Output
    /* Check if access is allowed */
    if(addOneBasic()){
        // Return Result AJAX
        echo json_encode($result);
    }else{
        // Return Access Denied AJAX
        echo json_encode('access denied');
    }
}


