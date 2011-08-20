<?php

/**
* LICENSE
*
* Copyright (c) 2011, Thiago Rigo.
* All rights reserved.
*
* Redistribution and use in source and binary forms, with or without modification,
* are permitted provided that the following conditions are met:
*
*     * Redistributions of source code must retain the above copyright notice,
* 		this list of conditions and the following disclaimer.
*
*     * Redistributions in binary form must reproduce the above copyright notice,
* 		this list of conditions and the following disclaimer in the documentation
* 		and/or other materials provided with the distribution.
*
*     * Neither the name of Thiago Rigo nor the names of its
* 		contributors may be used to endorse or promote products derived from this
* 		software without specific prior written permission.
*
* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
* ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
* WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
* DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
* ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
* (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
* LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
* ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
* (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
* SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*
*/

namespace Phoda\Session;

/**
 * Session
 * 
 * @author Thiago Rigo
 * @category Phoda
 * @package Session
 */
class Session implements \IteratorAggregate, \Countable
{
    /**
     * Name of the namespace in which the data is stored
     * 
     * @var string
     */
    protected $namespace;
    
    /**
     * Constructor
     * 
     * @param string $namespace
     */
    public function __construct($namespace = 'Default')
    {
        $this->namespace = $namespace;
    }
    
    /**
     * Sets the data into the $_SESSION
     * 
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function __set($key, $value)
    {
        $_SESSION[$this->namespace][$key] = $value;
    }
    
    /**
     * Gets the data from the $_SESSION 
     * 
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $_SESSION[$this->namespace][$key];
    }
    
    /**
     * Counts the properties stored into the $_SESSION
     * 
     * @return int
     */
    public function count()
    {
        return count($_SESSION[$this->namespace]);
    }

    /**
     * Makes possible iterate thru the $_SESSION
     * 
     * @see IteratorAggregate::getIterator()
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($_SESSION[$this->namespace]);
    }
        
    /**
     * Destroys the current session
     *
     * @static
     * @return bool
     */
    public static function destroy()
    {
        return session_destroy();
    }
    
    /**
     * Regenerates the session_id
     * 
     * @param bool $deleteOldSession
     * @return bool
     */
    public static function regenerateId($deleteOldSession = false)
    {
        return session_regenerate_id($deleteOldSession);
    }
    
    /**
     * Starts the session
     * 
     * @return bool
     */
    public static function start()
    {
        return session_start();
    }
}
