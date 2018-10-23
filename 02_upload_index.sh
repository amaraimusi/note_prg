#!/bin/sh
echo 'ソースコードを差分アップロードします。'



rsync -auvz ../note_prg/index.html amaraimusi@amaraimusi.sakura.ne.jp:www/note_prg

echo "------------ 送信完了"
cmd /k