<?php

# LAN Party repository
App::bind('MasonACM\Repositories\LanParty\LanPartyRepositoryInterface', 'MasonACM\Repositories\LanParty\LanPartyRepository');

# User repository
App::bind('MasonACM\Repositories\User\UserRepositoryInterface', 'MasonACM\Repositories\User\UserRepository');

# Forum repository
App::bind('MasonACM\Repositories\Forum\ForumRepositoryInterface', 'MasonACM\Repositories\Forum\ForumRepository');