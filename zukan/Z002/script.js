'use strict';
(() => {
 const search=document.getElementById('search');
 if(!search)return;
 const group=document.getElementById('group-filter'),cards=Array.from(document.querySelectorAll('.species-card'));
 const count=document.getElementById('result-count'),more=document.getElementById('load-more'),empty=document.getElementById('empty'),reset=document.getElementById('reset');
 const bn=document.documentElement.lang==='bn';let limit=24;
 const aliases={ishigaki:'石垣島',iriomote:'西表島',yonaguni:'与那国島',miyako:'宮古島',okinawa:'沖縄本島',hateruma:'波照間島',taketomi:'竹富島',citrus:'ミカン'};
 const normalize=s=>s.normalize('NFKC').toLocaleLowerCase().replace(/\b(ishigaki|iriomote|yonaguni|miyako|okinawa|hateruma|taketomi|citrus)\b/g,m=>aliases[m]).replace(/沖縄島/g,'沖縄本島').replace(/\s+/g,' ').trim();
 const tokens=cards.map(card=>normalize(card.dataset.search));
 function apply(keepLimit=false){
  if(!keepLimit)limit=24;
  const words=normalize(search.value).split(' ').filter(Boolean);
  let matched=0,shown=0;
  cards.forEach((card,i)=>{
   const match=(!group.value||card.dataset.group===group.value)&&words.every(w=>tokens[i].includes(w));
   if(match)matched++;
   card.hidden=!match||shown>=limit;
   if(match&&shown<limit)shown++;
  });
  count.textContent=bn?`${matched}টি ফল · ${shown}টি দেখানো হয়েছে`:`${matched}件の検索結果 · ${shown}件を表示`;
  more.hidden=shown>=matched;empty.hidden=matched>0;
 }
 search.addEventListener('input',()=>apply());group.addEventListener('change',()=>apply());
 more.addEventListener('click',()=>{limit+=24;apply(true)});
 reset.addEventListener('click',()=>{search.value='';group.value='';apply();search.focus()});
 more.hidden=false;reset.hidden=false;apply();
})();
document.querySelectorAll('[data-print]').forEach(button=>button.addEventListener('click',()=>window.print()));
