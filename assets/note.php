<?php if($pelaksana) : ?>
                        
                        <?php foreach ($pelaksana as $p) : ?>
                            
                            <?php $i = 1; ?>
                            <?php if($i == 1) : ?>
                                <td><?= $p['namaPelaksana']; ?></td>
                            </tr>
                            <?php else : ?>
                                <tr>
                                    <td><?= $p['namaPelaksana']; ?></td>
                                </tr>
                            <?php endif ; ?>
                            <?php $i++ ; ?>
    
                        <?php endforeach ; ?>

                    <?php else : ?>
                        
                    <td><i class="text-danger">Data Kosong</i></td>
                </tr>
                    <?php endif ; ?>