import calendar as C

def solution(y, m):
    
    C.setfirstweekday(6)
    s = C.month(y, m).strip()
    c = str(y)
    i = s.index(c) + len(c)
    
    return s[:i + 1] + " S  M Tu  W Th  F  S\n" + s[i + 22:].replace('\n', ' \n')

print(solution(2022, 9))