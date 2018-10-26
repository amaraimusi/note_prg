#!/bin/sh
echo 'ソースコードを差分アップロードします。'

rsync -auvz ../other amaraimusi@amaraimusi.sakura.ne.jp:www/note_prg

echo "------------ 送信完了"
cmd /k