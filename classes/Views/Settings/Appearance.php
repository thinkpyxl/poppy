<div class="poppy__field poppy__field--radio">
  <h4>Alignment</h4>
  <ul class="poppy__list">
    <li class="poppy__item">
      <label>
        <input
          type="radio"
          name="poppy[appearance][alignment]"
          value="left"
          <?php echo $context['alignment'] === 'left' ? 'checked' : ''; ?>
        />
        Left
      </label>
    </li>
    <li class="poppy__item">
      <label>
        <input
          type="radio"
          name="poppy[appearance][alignment]"
          value="center"
          <?php echo $context['alignment'] === 'center' ? 'checked' : ''; ?>
        />
        Center
      </label>
    </li>
    <li class="poppy__item">
      <label>
        <input
          type="radio"
          name="poppy[appearance][alignment]"
          value="right"
          <?php echo $context['alignment'] === 'right' ? 'checked' : ''; ?>
        />
        Right
      </label>
    </li>
  </ul>
</div>

<div class="poppy__field poppy__field--radio">
  <h4>Position</h4>
  <ul class="poppy__list">
    <li class="poppy__item">
      <label>
        <input
          type="radio"
          name="poppy[appearance][position]"
          value="top"
          <?php echo $context['position'] === 'top' ? 'checked' : ''; ?>
        />
        Top
      </label>
    </li>
    <li class="poppy__item">
      <label>
        <input
          type="radio"
          name="poppy[appearance][position]"
          value="center"
          <?php echo $context['position'] === 'center' ? 'checked' : ''; ?>
        />
        Center
      </label>
    </li>
    <li class="poppy__item">
      <label>
        <input
          type="radio"
          name="poppy[appearance][position]"
          value="bottom"
          <?php echo $context['position'] === 'bottom' ? 'checked' : ''; ?>
        />
        Bottom
      </label>
    </li>
  </ul>
</div>

<div class="poppy__field poppy__field--radio">
  <h4>Size</h4>
  <ul class="poppy__list">
    <li class="poppy__item">
      <label>
        <input
          type="radio"
          name="poppy[appearance][size]"
          value="full"
          <?php echo $context['size'] === 'full' ? 'checked' : ''; ?>
        />
        Full
      </label>
    </li>
    <li class="poppy__item">
      <label>
        <input
          type="radio"
          name="poppy[appearance][size]"
          value="wide"
          <?php echo $context['size'] === 'wide' ? 'checked' : ''; ?>
        />
        Wide
      </label>
    </li>
    <li class="poppy__item">
      <label>
        <input
          type="radio"
          name="poppy[appearance][size]"
          value="narrow"
          <?php echo $context['size'] === 'narrow' ? 'checked' : ''; ?>
        />
        Narrow
      </label>
    </li>
  </ul>
</div>

<div class="poppy__field poppy__field--checkbox">
  <h4>Docked</h4>
  <label>
    <input
      type="checkbox"
      name="poppy[appearance][docked]"
      <?php echo $context['docked'] ? 'checked' : ''; ?>
    />
    Docked
  </label>
</div>

<div class="poppy__field poppy__field--checkbox">
  <h4>Peek</h4>
  <label>
    <input
      type="checkbox"
      name="poppy[appearance][peek]"
      <?php echo $context['peek'] ? 'checked' : ''; ?>
    />
    Peek
  </label>
</div>

<div class="poppy__field poppy__field--text">
  <h4>Peek Message</h4>
  <label>
    <input
      type="text"
      name="poppy[appearance][peek_message]"
      value="<?php $context['peek'] ?>"
    />
  </label>
</div>