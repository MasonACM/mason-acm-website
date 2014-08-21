<?php

# LAN Party repository
App::bind('MasonACM\Repositories\LanParty\LanPartyRepositoryInterface', 'MasonACM\Repositories\LanParty\LanPartyRepository');
App::bind('MasonACM\Repositories\LanAttendee\LanAttendeeRepositoryInterface', 'MasonACM\Repositories\LanAttendee\LanAttendeeRepository');

# User repository
App::bind('MasonACM\Repositories\User\UserRepositoryInterface', 'MasonACM\Repositories\User\UserRepository');

# Forum repositories
App::bind('MasonACM\Repositories\Forum\ThreadRepositoryInterface', 'MasonACM\Repositories\Forum\ThreadRepository');
App::bind('MasonACM\Repositories\Forum\PostRepositoryInterface', 'MasonACM\Repositories\Forum\PostRepository');

# Interest Group repository
App::bind('MasonACM\Repositories\InterestGroup\InterestGroupRepositoryInterface', 'MasonACM\Repositories\InterestGroup\InterestGroupRepository');

# Team repository
App::bind('MasonACM\Repositories\Team\TeamRepositoryInterface', 'MasonACM\Repositories\Team\TeamRepository');
