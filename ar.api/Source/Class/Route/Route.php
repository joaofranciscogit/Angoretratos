<?php

	namespace Autoload\Class\Route;

	class Route
	{
		private static $route = null;
	
		public static function routeData($id)
	    {
	        if( self::$route == null )
	            self::routeList();
	         
	        if( isset( self::$route[ $id ] ) )
	            return self::$route[ $id ];
	         
	        return null;
	    }

	    public function routeShow($route, $url)
	    {
	    	if(isset($route[$url]))
		    {
		    	if(file_exists($route[$url]))
		    	{
		        	return $route[$url];
		    	}
		    	else
		    	{
		    		return false;
		    	}
		    }
		    else
		    {
		        return false;
		    }
	    }

	    private static function routeList()
	    {
	        global $_SERVER;
	         
	        $startUrl = strlen( $_SERVER["DOCUMENT_ROOT"] ) -1;
	        $excludeUrl = substr( $_SERVER["SCRIPT_FILENAME"], $startUrl, -10 );
	         
	        $request = $_SERVER['REQUEST_URI'];
	         
	        $request = substr( $request, strlen( $excludeUrl ) );
	         
	        $routeTmp = explode("?", $request);
	        $request = $routeTmp[ 0 ];
	         
	        $routeExplodida = explode("/", $request);
	         
	        $return = array();
	 
	        for($a = 0; $a <= count($routeExplodida); $a ++)
	        {
	            if(isset($routeExplodida[$a]) AND $routeExplodida[$a] != "")
	            {
	                array_push($return, $routeExplodida[$a]);
	            }
	        }

	        self::$route = $return;
	    }
	}