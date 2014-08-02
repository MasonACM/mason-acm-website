<?php

# LAN Party repository
App::bind('MasonACM\Repositories\LanParty\LanPartyRepositoryInterface', 'MasonACM\Repositories\LanParty\LanPartyRepository');

# User repository
App::bind('MasonACM\Repositories\User\UserRepositoryInterface', 'MasonACM\Repositories\User\UserRepository');

# Forum repositories
App::bind('MasonACM\Repositories\Forum\ThreadRepositoryInterface', 'MasonACM\Repositories\Forum\ThreadRepository');
App::bind('MasonACM\Repositories\Forum\PostRepositoryInterface', 'MasonACM\Repositories\Forum\PostRepository');

# Interest Group repository
App::bind('MasonACM\Repositories\InterestGroup\InterestGroupRepositoryInterface', 'MasonACM\Repositories\InterestGroup\InterestGroupRepository');