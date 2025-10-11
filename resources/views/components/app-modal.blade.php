<div class="fixed">
    <div class="modal-overlay" wire:click="closeModal"></div>
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title">Modal Title</h3>
            <button class="close-modal" wire:click="closeModal">X</button>
        </div>
        <div class="modal-body">
            <!-- Modal content goes here -->
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </div>
        <div class="modal-footer">
            <button wire:click="closeModal">Close</button>
        </div>
    </div>
</div>