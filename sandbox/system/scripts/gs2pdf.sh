#!/bin/bash

gs \
	-o output.pdf \
	-sDEVICE=pdfwrite \
	-dDEVICEWIDTHPOINTS=432 -dDEVICEHEIGHTPOINTS=648 \
	-dFIXEDMEDIA \
	-dCompatibilityLevel=1.4 \
	input.pdf
