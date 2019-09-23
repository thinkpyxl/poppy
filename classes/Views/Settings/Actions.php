<div class="poppy__field">
  <label>
    <input
      type="checkbox"
      name="poppy[actions][accept_display]"
      <?php echo $context['accept_display'] ? 'checked' : ''; ?>
    />
    Display Accept Button
  </label>
</div>

<div class="poppy__field">
  <label>
    <input
      type="checkbox"
      name="poppy[actions][decline_display]"
      <?php echo $context['decline_display'] ? 'checked' : ''; ?>
    />
    Display Decline Button
  </label>
</div>

<div class="poppy__field">
  <label>
    <input
      type="checkbox"
      name="poppy[actions][more_display]"
      <?php echo $context['more_display'] ? 'checked' : ''; ?>
    />
    Display More Button
  </label>
</div>