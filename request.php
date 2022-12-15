<?
    function post_req($offset, $limit) {
        $ini = parse_ini_file('settings.ini');
        $login = $ini['api_login'];
        $password = '4k7U99';
        $url = 'https://uzpharminfo.uz/b/darmon/dsmc/external/registry$exp_drug_box_group_registry';
        $ch = curl_init();
        $data = [
            'offset'=> "$offset",
            'limit'=> "$limit" 
        ];
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $result = curl_exec($ch);
        $sec_res = json_decode($result, true);
        curl_close($ch);
        return $sec_res;
    }
?>
