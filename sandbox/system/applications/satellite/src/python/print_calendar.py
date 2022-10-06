import calendar as C
import re

def solution(Y, M):
    R = C.TextCalendar(6).formatmonth(Y, M)
    for r in "Su Mo We Fr Sa".split():
        R = re.sub(r, " "+r[0], R)
    X = R.strip().split("\n")
    i = 2
    for _ in X[1:-2]:
        X[i] += " "
        i += 1
    return "\n".join(X)

print(solution(2022, 10));