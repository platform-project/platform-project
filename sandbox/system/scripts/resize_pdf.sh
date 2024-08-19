#!/bin/sh

gs -o output.pdf -sDEVICE=pdfwrite -dFIXEDMEDIA -dPDFFitPage \
    -dDEVICEWIDTHPOINTS=432 -dDEVICEHEIGHTPOINTS=648 -dBATCH \
    -dSAFER Resized-Weekly-planner.pdf
