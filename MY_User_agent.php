<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_User_agent extends CI_User_agent
{
    /**
     * @param string $key
     * @return bool
     */
    public function is_tablet($key = NULL)
    {
        if ($this->is_mobile($key)) {

            $user_agent = trim($_SERVER['HTTP_USER_AGENT']);
            $is_tablet = preg_match('#.*ipad.*#i', $user_agent);
            $is_tablet = $is_tablet + preg_match('#.*Android.*Chrome/[.0-9]*(?!Mobile)#i', $user_agent);

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