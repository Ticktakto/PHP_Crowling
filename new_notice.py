import requests
from bs4 import BeautifulSoup

f = open('new_data.txt', 'r', encoding='utf-8')
old_haksa = f.readline()
old_normal = f.readline()
old_saup = f.readline()
f.close()

f = open('new_data.txt', 'w', encoding='utf-8')

haksa = 0
normal = 0
saup = 0

req_haksa = requests.get('https://computer.cnu.ac.kr/computer/notice/bachelor.do')
html = req_haksa.text
soup = BeautifulSoup(html, 'html.parser')

for data in soup.select('.b-new > span'):
    haksa = haksa+1
print(haksa, file=f)

req_normal = requests.get('https://computer.cnu.ac.kr/computer/notice/notice.do')
html = req_normal.text
soup = BeautifulSoup(html, 'html.parser')

for data in soup.select('.b-new > span'):
    normal = normal+1
print(normal, file=f)

req_saup = requests.get('https://computer.cnu.ac.kr/computer/notice/project.do')
html = req_saup.text
soup = BeautifulSoup(html, 'html.parser')

for data in soup.select('.b-new > span'):
    saup = saup+1
print(saup, file=f)

if haksa > int(old_haksa):
    print('새로운 학사공지가 있습니다.', file=f)
else:
    print('새로운 학사공지가 없습니다.', file=f)
if normal > int(old_normal):
    print('새로운 일반공지가 있습니다.', file=f)
else:
    print('새로운 일반공지가 없습니다.', file=f)
if saup > int(old_saup):
    print('새로운 사업단소식이 있습니다.', file=f)
else:
    print('새로운 사업단소식이 없습니다.', file=f)

f.close()
