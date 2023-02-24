"use strict"

import {initMultiselect, handleClick} from './multiselect.js'

// References

const multiselect = document.querySelector('#chords-multiselect')
const multiselectList = multiselect.querySelector('.multiselect-list')

// State

let selectedChordIds = []

// Functions

multiselectList.addEventListener('click', e => {
    let targetElement = e.target.closest('.select-item')

    if(targetElement != null) {
        handleClick(multiselect, targetElement, selectedChordIds)
    }
})

// Init

initMultiselect(multiselect, selectedChordIds)