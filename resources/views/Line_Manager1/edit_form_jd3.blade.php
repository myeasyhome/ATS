                <div class="form-group" style="padding-bottom: 20px;">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-sm-1 text-center">No</th>
                                    <th class="col-sm-9 text-center">Soft Competencies</th>
                                    <th class="col-sm-2 text-center">Required (1-5)<span style="color: red;">*</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Learning Agility</td>
                                    <td><input class="form-control" type="number" value="{{ $soft[0] }}" name="soft[0]" max="5" required></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>Making Difference</td>
                                    <td><input class="form-control" type="number" value="{{ $soft[1] }}" name="soft[1]" min="1" max="5" required></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>People Management</td>
                                    <td><input class="form-control" type="number" value="{{ $soft[2] }}" name="soft[2]" min="1" max="5" required></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>Accelerate Business And Customer</td>
                                    <td><input class="form-control" type="number" value="{{ $soft[3] }}" name="soft[3]" min="1" max="5" required></td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td>Translating Strategy into Action</td>
                                    <td><input class="form-control" type="number" value="{{ $soft[4] }}" name="soft[4]" min="1" max="5" required></td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td>Decisiveness</td>
                                    <td><input class="form-control" type="number" value="{{ $soft[5] }}" name="soft[5]" min="1" max="5" required></td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                    <td>Cultivate  Networks & Partnerships</td>
                                    <td><input class="form-control" type="number" value="{{ $soft[6] }}" name="soft[6]" min="1" max="5" required></td>
                                </tr>
                            </tbody>
                        </table>
                        <span><i style="color: red;">Proficiency Level: 1. Significant Development Needed; 2. Development Needed; 3. Partially Meet Expectation; 4. Meet Expectation; 5. Exceed Expectation</i></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered" id="table_hard_competencies">
                            <thead>
                                <tr>
                                    <th class="col-sm-1 text-center">No</th>
                                    <th class="col-sm-9 text-center">Hard Competencies</th>
                                    <th class="col-sm-2 text-center">Required (1-5)<span style="color: red;">*</span></th>
                                    <th class="col-sm-1 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($hard as $array => $value)
                                    <tr id="row{{ $array }}" >
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td>
                                            <input class="form-control" type="text" value="{{ ucwords($value) }}" name="hard[]" required>
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" value="{{ $hard_value[$array] }}" name="value[]" min="1" max="5" required>
                                        </td>
                                        <td>
                                            <button type="button" id="{{ $array }}" class="btn btn-danger btn_remove_hard">X</button>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- <tr>
                                    <td class="text-center">1</td>
                                    <td><input class="form-control" type="text" name="hard[]" required></td>
                                    <td><input class="form-control" type="number" name="value[]" min="1" max="5" required></td>
                                    <td><button type="button" id="add_hard_competencies" class="btn btn-primary">+</button></td>
                                </tr> --}}
                                {{-- <tr>
                                    <td class="text-center">2</td>
                                    <td>Competency Development & Assessment</td>
                                    <td><input class="form-control" type="number" name="hard[1]" min="1" max="5" required></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>Compensation & Benefit Management</td>
                                    <td><input class="form-control" type="number" name="hard[2]" min="1" max="5" required></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>Organization Design</td>
                                    <td><input class="form-control" type="number" name="hard[3]" min="1" max="5" required></td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td>Performance Management</td>
                                    <td><input class="form-control" type="number" name="hard[4]" min="1" max="5" required></td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td>Project Management</td>
                                    <td><input class="form-control" type="number" name="hard[5]" min="1" max="5" required></td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                    <td>Business Process Design & Improvement</td>
                                    <td><input class="form-control" type="number" name="hard[6]" min="1" max="5" required></td>
                                </tr>
                                <tr>
                                    <td class="text-center">8</td>
                                    <td>Telco & Digital Business</td>
                                    <td><input class="form-control" type="number" name="hard[7]" min="1" max="5" required></td>
                                </tr> --}}
                            </tbody>
                        </table>
                        <div style="padding-bottom: 20px">
                            <button type="button" id="add_hard_competencies" class="btn btn-primary">+</button>
                        </div>
                        <span><i style="color: red;">*Proficiency Level: 1. Introductory; 2. Basic; 3. Intermediate; 4. Advanced; 5. Expert</i></span>
                    </div>
                </div>