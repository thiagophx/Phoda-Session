Phoda\Session
==============

Simple session management component


How to use it
=============

Setting and getting properties
------------------------------

	use Phoda\Session\Session;

    require 'Session.php';

    Session::start();
	
    $session = new Session();
    $session->name = 'My name';
    $session->emails = array('email1@example.com', 'email2@example.com');

	// Objects are serialized and unserialized automatically
    $session->user = new stdClass();
    
    var_dump($session->name);
    var_dump($session->emails);
    var_dump($session->user);
    
    Session::destroy();

Checking whether the property isset and removing the property
--------------------------

	use Phoda\Session\Session;

    require 'Session.php';

    Session::start();

    $session = new Session();
    $session->name = 'My name';
    $session->emails = array('email1@example.com', 'email2@example.com');
    $session->user = new stdClass();
	
	var_dump(isset($session->name));
	$session->remove('name');
	var_dump(isset($session->name));

    Session::destroy();
	
Iterating thru the session
--------------------------
	
	use Phoda\Session\Session;

    require 'Session.php';

    Session::start();
	
    $session = new Session();
    $session->name = 'My name';
    $session->emails = array('email1@example.com', 'email2@example.com');
    $session->user = new stdClass();
    
    foreach ($session as $prop)
        var_dump($prop);
    
    Session::destroy();

Counting properties
-------------------
	
	use Phoda\Session\Session;

    require 'Session.php';

    Session::start();
	
    $session = new Session();
    $session->name = 'My name';
    $session->emails = array('email1@example.com', 'email2@example.com');
    $session->user = new stdClass();
    
    echo count($session);
    
    Session::destroy();
    
Regenerating session_id
--------------------------
	
	use Phoda\Session\Session;

    require 'Session.php';

    Session::start();
	
    $session = new Session();
    $session->name = 'My name';
    $session->emails = array('email1@example.com', 'email2@example.com');
    $session->user = new stdClass();
    
    Session::regenerateId();
    
    Session::destroy();


License Information
===================

Copyright (c) 2011, Thiago Rigo.
All rights reserved.

Redistribution and use in source and binary forms, with or without modification,
are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice,
this list of conditions and the following disclaimer.

* Redistributions in binary form must reproduce the above copyright notice,
this list of conditions and the following disclaimer in the documentation
and/or other materials provided with the distribution.

* Neither the name of Thiago Rigo nor the names of its
contributors may be used to endorse or promote products derived from this
software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
