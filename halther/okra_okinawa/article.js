const $=id=>document.getElementById(id);
const data=JSON.parse($('climate-data').textContent);
const evidence=JSON.parse($('evidence-data').textContent);
const esc=s=>String(s).replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
function draw(){
  const rows=data.filter(r=>r.period===$('period').value);
  const x=m=>52+(m-1)*65,y=t=>246-(t-12)*9.4;
  let svg='<title>名護 '+esc($('period').value)+'の独自月別平均気温</title><desc>月平均気温と日最低・日最高の月平均。25度の線は比較用で、地温ではありません。</desc>';
  for(const t of [15,20,25,30])svg+=`<path d="M52 ${y(t)} H768" stroke="${t===25?'#b6883a':'#dce3d3'}" ${t===25?'stroke-dasharray="5 5"':''}/><text x="18" y="${y(t)+4}">${t}℃</text>`;
  const band=rows.map(r=>`${x(r.month)},${y(r.mean_daily_max_temperature_c)}`).join(' ')+ ' '+[...rows].reverse().map(r=>`${x(r.month)},${y(r.mean_daily_min_temperature_c)}`).join(' ');
  svg+=`<polygon points="${band}" fill="#cddfba" opacity=".65"/><polyline points="${rows.map(r=>`${x(r.month)},${y(r.mean_temperature_c)}`).join(' ')}" fill="none" stroke="#245d47" stroke-width="3"/>`;
  for(const r of rows)svg+=`<circle cx="${x(r.month)}" cy="${y(r.mean_temperature_c)}" r="4" fill="#245d47"><title>${r.month}月 平均${r.mean_temperature_c.toFixed(1)}℃</title></circle><text x="${x(r.month)}" y="${y(r.mean_temperature_c)-12}" text-anchor="middle">${r.mean_temperature_c.toFixed(1)}</text><text x="${x(r.month)}" y="280" text-anchor="middle">${r.month}月</text>`;
  $('climate-chart').innerHTML=svg;
}
function renderEvidence(){
  const q=$('evidence-query').value.normalize('NFKC').toLowerCase().trim();
  const rows=evidence.filter(r=>[r.code,r.title,r.period,r.text].join(' ').normalize('NFKC').toLowerCase().includes(q));
  $('evidence-count').textContent=`関連箇所${evidence.length}件中 ${rows.length}件`;
  $('evidence-results').innerHTML=rows.map(r=>`<article><h3>${esc(r.code)} · ${esc(r.title)}</h3><p class="meta">${esc(r.period)} ／ ${esc(r.time)}</p><p>${esc(r.text)}</p><small>${esc(r.period_evidence)}</small></article>`).join('')||'<p>該当する字幕はありません。</p>';
}
$('period').addEventListener('change',draw);
$('evidence-query').addEventListener('input',renderEvidence);
draw();renderEvidence();
