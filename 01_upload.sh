﻿#!/bin/sh
echo 'ソースコードを差分アップロードします。'

rsync -auvz --exclude='.git/' ../note_prg amaraimusi@amaraimusi.sakura.ne.jp:www


echo "------------ 送信完了"
#cmd /k