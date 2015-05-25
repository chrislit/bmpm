#!/usr/bin/env python3

from urllib.request import urlopen
import codecs
"""
# retrieval section
urls = [
    'http://localhost/bm/bmpm_batch.php?inputFileName=nachnamen.csv&outputFileName=nachnamen.bm.german&language=german',
    'http://localhost/bm/bmpm_batch.php?inputFileName=nachnamen.csv&outputFileName=nachnamen.bm.auto&language=auto',
    'http://localhost/bm/bmpm_batch.php?inputFileName=uscensus2000.csv&outputFileName=uscensus2000.bm-ashA&type=ash&match=approx',
    'http://localhost/bm/bmpm_batch.php?inputFileName=uscensus2000.csv&outputFileName=uscensus2000.bm-sepA&type=sep&match=approx',
    'http://localhost/bm/bmpm_batch.php?inputFileName=uscensus2000.csv&outputFileName=uscensus2000.bm-genA&type=gen&match=approx',
    'http://localhost/bm/bmpm_batch.php?inputFileName=uscensus2000.csv&outputFileName=uscensus2000.bm-genE&type=gen&match=exact',
    'http://localhost/bm/bmpm_batch.php?inputFileName=uscensus2000.csv&outputFileName=uscensus2000.bm-ashE&type=ash&match=exact',
    'http://localhost/bm/bmpm_batch.php?inputFileName=uscensus2000.csv&outputFileName=uscensus2000.bm-sepE&type=sep&match=exact',
]

for url in urls:
    urlopen(url, timeout=100000)
"""
# combining section

def writemerged(outf, flist, head):
    bmpm = dict()
    ordered = list()
    for fn in flist:
        with codecs.open(fn, 'r', 'utf-8') as f:
            next(f)
            for l in f:
                w, code = l.strip().split(',')
                if w not in bmpm:
                    ordered.append(w)
                    bmpm[w] = [w]
                bmpm[w].append(code)
    with codecs.open(outf, 'w', 'utf-8') as f:
        f.write(head+'\n')
        for w in ordered:
            f.write(','.join(bmpm[w]))
            f.write('\n')


files_nachnamen = ['nachnamen.bm.german',
                   'nachnamen.bm.auto']

writemerged('nachnamen.bm.csv', files_nachnamen,
            'name,bmpm,bmpm_auto')

files_census = ['uscensus2000.bm-genA',
                'uscensus2000.bm-ashA',
                'uscensus2000.bm-sepA',
                'uscensus2000.bm-genE',
                'uscensus2000.bm-ashE',
                'uscensus2000.bm-sepE']

writemerged('uscensus2000.bm.csv', files_census,
            'name,bmpm_gen_approx,bmpm_ash_approx,bmpm_sep_approx,'+
            'bmpm_gen_exact,bmpm_ash_exact,bmpm_sep_exact')
