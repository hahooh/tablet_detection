<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_User_agent extends CI_User_agent
{
    // fake user agent strings for test purpose
    private $fake_user_agents = array(
        'iphone' => "Mozilla/5.0 (iPhone; CPU iPhone OS 10_3 like Mac OS X) AppleWebKit/603.1.23 (KHTML, like Gecko) Version/10.0 Mobile/14E5239e Safari/602.1",
        'macintosh' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_4) AppleWebKit/600.7.12 (KHTML, like Gecko) Version/8.0.7 Safari/600.7.12',
        'ipad' => 'Mozilla/5.0 (iPad; CPU OS 9_0 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13A4325c Safari/601.1',
        'nexus_5' => 'Mozilla/5.0 (Linux; Android 5.1.1; Nexus 5 Build/LMY48B; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/43.0.2357.65 Mobile Safari/537.36',
        'android_tablet' => 'Mozilla/5.0 (Linux; Android 5.1.1; Nexus 5 Build/LMY48B; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/43.0.2357.65 Safari/537.36',
        'linux' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36',
        'windows' => 'Mozilla/4.0 (compatible; MSIE 7.0; America Online Browser 1.8-standalone; rev1.8; Windows NT 5.1; FunWebProducts; .NET CLR 1.1.4322; .NET CLR 2.0.50727)',
        'windows_ie' => 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Win64; x64; Trident/5.0)',
        'some_tablet' => 'Mozilla/5.0 (Linux; Android 4.4.2; Edison 3 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Safari/537.36',
    );

    /**
     * @param string $key
     * @return bool
     */
    public function is_tablet($key = NULL)
    {
        if ($this->is_mobile($key)) {

            $user_agent = trim($_SERVER['HTTP_USER_AGENT']);
            $is_tablet = preg_match('#.*ipad.*#i', $user_agent);
            $is_tablet = $is_tablet + preg_match('#.* Android .* Chrome/[.0-9]* (?!Mobile)#i', $user_agent);

            if ($is_tablet > 0)
                return true;
            else
                return false;
        } else {
            return false;
        }
    }


    /**
     * @return array
     */
    public function get_fake_user_agent()
    {
        return $this->fake_user_agents;
    }

    /**
     * @return array
     */
    public function show_browsers()
    {
        return $this->browsers;
    }

    /**
     * @return array
     */
    public function show_mobiles()
    {
        return $this->mobiles;
    }
}