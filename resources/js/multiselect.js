// Reusable functionality for multiselect components, this should not hold state or specific references.


// Correct multiselect component should be passed in, so querySelectors only need to worry about class names, dependency injection right?
// TODO: move '#chords-multiselect' from these selectors to make it generic, pass correct element in instead.
const hiddenInput = document.querySelector('#chords-multiselect .hidden-input')
const multiselectList = document.querySelector('#chords-multiselect .multiselect-list')
const selectedList = document.querySelector('#chords-multiselect .selected-list')


// Functions


// Utility