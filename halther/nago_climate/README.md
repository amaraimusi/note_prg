# 名護の月別気象データ

出典：気象庁「過去の気象データ検索」名護（沖縄県）、観測地点番号47940・府県番号91。
収録期間：1990年1月〜2026年10月、442か月。取得日：2026年10月12日（日本時間）。
2026年10月は途中集計。日別公開表で確認した最新日付は2026年10月11日。
月別統計と日別表には公開更新時刻の差があり得るため、日別表から月値を再計算せず、月別公開表の値をそのまま採用した。

## ファイル
- nago_monthly_1990_2026.sqlite：SQLite 3。出典表の元HTMLもsourcesに保存。
- nago_monthly_1990_2026.csv：UTF-8 BOM付き。1行1か月、年月の昇順、数値は単位なし。欠値は空欄。
- nago_climate.html：オフラインでも使える閲覧ページ。年・月の絞り込みとグラフ、全件CSV/SQLiteダウンロード。
- data.json：ページと同じデータのJSON。

## テーブル
- monthly_climate：月別の横持ちデータ。主キー(station_id,year,month)。CSVと同じ列。
- monthly_observations：1か月1指標の縦持ちデータ。value、quality、source_flag、raw_valueを分離。
- stations：観測地点。
- metrics：指標名・日本語名称・単位。
- sources：出典URL、取得時刻（日本時間）、元HTMLのSHA-256、元HTML。
- metadata：対象期間・取得基準日等。valueはJSON文字列。
- completed_monthly_climate（ビュー）：月の途中集計を除外。品質区分は別途選別する。

## 品質区分
normal：記号なし。quasi_normal：「)」準正常値。
insufficient：「]」資料不足値。2026年10月は対象月自体が未完了。
missing：「×」欠測。missing_or_not_observed：「///」欠測または未観測。
unavailable：空白。no_phenomenon：「--」該当現象なし。suspect：「#」疑問値。
欠値・未観測を0に補完していない。原文は各指標の_raw列、品質区分は_quality列。
「]」は月途中以外にも出現するので、period_statusと品質区分の両方を確認する。
日最高/日最低気温の月平均と、月内最高/最低の極値は別の指標。
観測場所・装置等の変更による均質性の注記は元HTMLで確認できる。長期比較時には気象庁の注意事項を参照。

値欄の記号：https://www.data.jma.go.jp/stats/data/mdrr/man/remark.html
利用上の注意：https://www.data.jma.go.jp/stats/data/mdrr/man/first.html

## SQL例
SELECT year_month, mean_temperature_c, max_temperature_c, min_temperature_c, precipitation_mm
FROM monthly_climate ORDER BY year, month;

-- 月途中・資料不足値を除いた降水量の年合計（12か月揃った年のみ）
SELECT year, SUM(precipitation_mm) AS annual_precipitation_mm
FROM completed_monthly_climate
WHERE precipitation_mm_quality IN ('normal','quasi_normal')
GROUP BY year HAVING COUNT(*)=12;

## 指標一覧
- station_pressure_hpa: 現地気圧の月平均 (hPa)
- sea_level_pressure_hpa: 海面気圧の月平均 (hPa)
- precipitation_mm: 月降水量合計 (mm)
- max_daily_precipitation_mm: 日降水量の月最大 (mm)
- max_hourly_precipitation_mm: 1時間降水量の月最大 (mm)
- max_10min_precipitation_mm: 10分間降水量の月最大 (mm)
- mean_temperature_c: 月平均気温 (℃)
- mean_daily_max_temperature_c: 日最高気温の月平均 (℃)
- mean_daily_min_temperature_c: 日最低気温の月平均 (℃)
- max_temperature_c: 月内の最高気温（極値） (℃)
- min_temperature_c: 月内の最低気温（極値） (℃)
- mean_relative_humidity_pct: 相対湿度の月平均 (%)
- min_relative_humidity_pct: 相対湿度の月最小 (%)
- mean_wind_speed_ms: 月平均風速 (m/s)
- max_wind_speed_ms: 月最大風速 (m/s)
- max_gust_speed_ms: 月最大瞬間風速 (m/s)
- sunshine_hours: 月日照時間合計 (h)

補助列：station_id, year, month, year_month, period_status, source_id, source_url, retrieved_at, max_wind_direction, max_gust_direction。
