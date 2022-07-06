🥔

#### TOOLS
* https://archlinux.org/ (btw), can be happily ran using virtualization (Hyper-V my preferred choice atm)
* https://github.com/junegunn/fzf
* https://docs.docker.com/compose/cli-command/
* https://grml.org/zsh/

#### OPINIONATED SETUP
```shell
#copy contents to ~/bin/dxp ("docker exec private" abbreviation)
#remember to set executable bit (chmod+x)
#!/usr/bin/env zsh
projectName=$(basename "$(pwd)")
docker exec -w /var/www/"$projectName" -it "$projectName"-php /bin/zsh
---
# Commands below must be run in project directory
wget -O ./docker/data/home/www-data/.zshrc https://git.grml.org/f/grml-etc-core/etc/zsh/zshrc
---
#copy contents to ./docker/data/home/www-data/.zshrc.local
alias ll='LANG=C ls -lah --color --group-directories-first'
alias sf='php bin/console'

setopt HIST_FIND_NO_DUPS

source /usr/share/fzf/key-bindings.zsh

FZF_KEYBINDINGS_FILE=~/fzf/shell/key-bindings.zsh
if [[ -f ${FZF_KEYBINDINGS_FILE} ]]; then
    source ${FZF_KEYBINDINGS_FILE}
    __fzf_history__() (
      local line
      shopt -u nocaseglob nocasematch
      line=$(
        HISTTIMEFORMAT= history | tac | sort --key=2.1 -bus | sort -n |
        FZF_DEFAULT_OPTS="--height ${FZF_TMUX_HEIGHT:-40%} $FZF_DEFAULT_OPTS --tac -n2..,.. --tiebreak=index --bind=ctrl-r:toggle-sort $FZF_CTRL_R_OPTS +m" $(__fzfcmd) |
        command grep '^ *[0-9]') &&
        if [[ $- =~ H ]]; then
          sed 's/^ *\([0-9]*\)\** .*/!\1/' <<< "$line"
        else
          sed 's/^ *\([0-9]*\)\** *//' <<< "$line"
        fi
    )
fi

##prompt
zstyle ':prompt:grml:left:setup' items time user at host path vcs percent
```

#### WORKFLOW
```shell
# running below command should be automated, no need to repeat it every system boot
docker compose start
# lets go into php CLI with our nifty shell command which we set up before
dxp
#grml zsh shell inside docker php
#use <ctr-r> and thanks to fzf we have access to very useful auto-complete n history
```
