# Alchemy command completion

_alchemy_console_command_list () {
   bin/console --no-ansi | sed "1,/Available commands/d" | awk '/^  ?[^ ]+ / { print $1 }'
}

_alchemy_developer_command_list () {
   bin/developer --no-ansi | sed "1,/Available commands/d" | awk '/^  ?[^ ]+ / { print $1 }'
}

_alchemy_setup_command_list () {
   bin/setup --no-ansi | sed "1,/Available commands/d" | awk '/^  ?[^ ]+ / { print $1 }'
}

_alchemy_console () {
   compadd `_alchemy_console_command_list`
}
_alchemy_developer () {
   compadd `_alchemy_developer_command_list`
}
_alchemy_setup () {
   compadd `_alchemy_setup_command_list`
}

compdef _alchemy_console 'bin/console'
compdef _alchemy_developer 'bin/developer'
compdef _alchemy_setup 'bin/setup'
